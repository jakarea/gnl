<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $filterLabels = [
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        'last7days' => 'Last 7 days',
        'thisMonth' => 'This Month',
        'thisYear' => 'This Year',
    ];

    public function index(){


        $filter = request()->query('filter', 'all');

        $query = Notification::orderByDesc('id');

        switch ($filter) {
            case 'today':
                $query->whereDate('created_at', today());
                break;
            case 'yesterday':
                $query->whereDate('created_at', today()->subDay());
                break;
            case 'last7days':
                $query->whereBetween('created_at', [today()->subDays(7), today()]);
                break;
            case 'thisMonth':
                $query->whereMonth('created_at', today()->month);
                break;
            case 'thisYear':
                $query->whereYear('created_at', today()->year);
                break;
        }

        $data['notifications'] = $query->paginate(20)->appends(['filter' => $filter]);
        $data['filterLabels'] = $this->filterLabels;
        return view('notifications.index', $data);
    }

    public function markAsReadUnread($id)
    {
        $notification = Notification::findOrFail($id);
        if( $notification->status){
            $notification->update(['status' => 0]);
        }else{
            $notification->update(['status' => 1]);
        }
        return back();
    }





}
