<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Earning;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['customers'] = Customer::with('projects')->whereHas('projects', function ($query) {
            $query->whereBetween('end_date', [now(), now()->addDays(5)]);
        })->get();

        $data['tasks'] = Task::whereDate('date', '>=', now()->toDateString())
        ->whereDate('date', '<=', now()->addDays(2)->toDateString())
        ->get();

        $data['activeClients'] = Earning::with('customer')->get();
        return view('dashboard/index', $data);
    }

    public function analytics(){
        return view('dashboard/analytics');
    }
}
