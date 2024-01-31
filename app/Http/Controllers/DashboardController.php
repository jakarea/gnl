<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        // Get customers with projects ending within the next 5 days
        $data['customers'] = Customer::with('projects')->whereHas('projects', function ($query) {
            $query->whereBetween('end_date', [now(), now()->addDays(5)]);
        })->get();

        $data['tasks'] = $this->getTaskUpComming();

        $data['earnings'] = Earning::with('customer')->paginate(12);

        return view('dashboard/index', $data);
    }

    public function analytics(){
        return view('dashboard/analytics');
    }


    function calculatePercentageIncrease($currentCount, $previousCount): float
    {
        return $previousCount !== 0 ? (($currentCount - $previousCount) / $previousCount) * 100 : 0;
    }

    protected function getTaskUpComming (){
        return Task::whereDate('date', '>=', now()->toDateString())
        ->whereDate('date', '<=', now()->addDays(2)->toDateString())
        ->get();
    }


}
