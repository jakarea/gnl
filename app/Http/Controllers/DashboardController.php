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

        $query = Customer::query();

        // Get counts for the current month
        $data['totalCustomer'] = $query->count();
        $data['newCustomer'] = $query->where('created_at', '>=', now()->subDays(7))->count();
        $data['repeatedCustomer'] = $query->whereColumn('updated_at', '>', 'created_at')->count();

        // Get counts for the previous month
        $previousMonthRange = [
            now()->subMonths(2)->startOfMonth(),
            now()->subMonth()->endOfMonth()
        ];
        $previousMonthTotalCustomers = $query->whereBetween('created_at', $previousMonthRange)->count();
        $previousMonthNewCustomers = $query->whereBetween('created_at', $previousMonthRange)->count();
        $previousMonthRepeatedCustomers = $query->whereBetween('updated_at', $previousMonthRange)->count();

        // Calculate percentage increase
        $data['totalCustomerInc'] = round($this->calculatePercentageIncrease($data['totalCustomer'], $previousMonthTotalCustomers), 2);
        $data['newCustomerInc'] = round($this->calculatePercentageIncrease($data['newCustomer'], $previousMonthNewCustomers), 2);
        $data['repeatCustomerInc'] = round($this->calculatePercentageIncrease($data['repeatedCustomer'], $previousMonthRepeatedCustomers), 2);

        // Get customers with projects ending within the next 5 days
        $data['customers'] = Customer::with('projects')->whereHas('projects', function ($query) {
            $query->whereBetween('end_date', [now(), now()->addDays(5)]);
        })->get();



        $data['tasks'] = $this->getTaskUpComming();

        $earning = new Earning();

        $data['totalIncome'] = 0;

        $data['totalExpense'] = 0;
        $data['totalProfit'] = 0;

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
