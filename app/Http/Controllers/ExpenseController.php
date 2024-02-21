<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\LeadType;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Expense\ExpenseRequest;

class ExpenseController extends ApiController
{
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $today;
    protected $thisMonth;
    protected $lastMonth;
    protected $lastAgoMonth;
    protected $thisYear;
    protected $lastYear;
    protected $lastAgoYear;

    protected $filterLabels = [
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        'last7days' => 'Last 7 days',
        'thisMonth' => 'This Month',
        'thisYear' => 'This Year',
    ];

    public function __construct()
    {
        $this->today = Carbon::today();
        $this->thisMonth = Carbon::now()->startOfMonth();
        $this->lastMonth = Carbon::now()->subMonth()->startOfMonth();
        $this->lastAgoMonth = Carbon::now()->subMonths(2)->startOfMonth();
        $this->thisYear = Carbon::now()->year;
        $this->lastYear = Carbon::now()->subYear()->startOfYear();
        $this->lastAgoYear = Carbon::now()->subYears(2)->startOfYear();
    }

    public function index()
    {

        $queryStatus = isset($_GET['query']) ? $_GET['query'] : '';

        // seledted sort query
        $selectedQuery = '';
        if (!empty($queryStatus)) {
            $selectedQuery = $queryStatus;
        }

        $data['getExpensePerMonths'] =  $this->getExpensePerMonth();

        $data['getExpenseAnalyticsGraph'] = $this->getExpenseAnalytics();


        $data['fixedExpense'] = $this->getExpenses($queryStatus, 'amount',['fixed']);
        $data['variableExpense'] = $this->getExpenses($queryStatus, 'amount',['variable']);
        $data['totalExpense'] = $this->getExpenses($queryStatus, 'amount',['fixed','variable']);
        $data['fixedTax'] = $this->getExpenses($queryStatus, 'tax',['fixed']);
        $data['variableTax'] = $this->getExpenses($queryStatus, 'tax',['variable']);
        $data['totalTax'] = $this->getExpenses($queryStatus, 'tax',['fixed','variable']);

        $data['currentTaxPerYear'] = $this->currentYearTax();
        $data['previousTaxPerYear'] = $this->previousYearTax();

        // return $data;

        // return $data;

        $data['lead_types'] = LeadType::orderByDesc('lead_type_id')->get();

        $filter = request()->query('filter', 'all');

        $query = Expense::orderByDesc('expense_id');

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

        $data['selectedQuery'] = $selectedQuery;
        $data['expenses'] = $query->paginate(20)->appends(['filter' => $filter]);

        $data['filterLabels'] = $this->filterLabels;

        return view('expenses.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        $data = $request->except(['invoice']);

        // dd( $data);
        $expense = Expense::create($data);

        if ($request->hasFile('invoice')) {
            $avatar = $request->file('invoice');
            $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('expenses', $filename, 'public');
            $expense->update(['file' => 'storage/'. $avatarPath]);
        }

        return redirect('/expenses')->withSuccess('Expenses create successfuly!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($expense_id)
    {
       $expense = Expense::findOrFail( $expense_id);
        return $this->jsonResponse(false, $this->success, $expense, $this->emptyArray, JsonResponse::HTTP_OK);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($expense_id)
    {
        $expense = Expense::findOrFail( $expense_id);
        if( $expense->delete() ){
            return $this->jsonResponse(false, $this->success, $expense, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }


    private function getExpensePerMonth()
    {
        $espenseCounts = [];
        $currentYear = $this->thisYear;

        for ($month = 1; $month <= 12; $month++) {
            $expenseCount = Expense::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->sum('amount');

            $espenseCounts[] = $expenseCount;
        }

        return $espenseCounts;
    }

    private function getExpenseAnalytics()
    {
        $totalExpenses = Expense::count();

        $fixed = Expense::where('type','fixed')->count();
        $variable = Expense::where('type','variable')->count();


        $fixedPercentage = ($totalExpenses > 0) ? ($fixed / $totalExpenses) * 100 : 0;
        $variablePercentage = ($totalExpenses > 0) ? ($variable / $totalExpenses) * 100 : 0;
        return ['fixed' => $fixedPercentage, 'variable' => $variablePercentage, 'totalExpense' => $totalExpenses];
    }

    // query map for sort
    private function getQueryMap()
    {
        $queryMap = [
            'last_month' => [
                'expense' => ['year' => $this->lastMonth->year, 'month' => $this->lastMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'this_year' => [
                'expense' => ['year' => $this->thisYear],
                'compare' => ['year' => $this->lastYear->year]
            ],
            'last_year' => [
                'expense' => ['year' => $this->lastYear->year],
                'compare' => ['year' => $this->lastAgoYear->year]
            ],
            'this_month' => [
                'expense' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'all_time' => [
                'expense' => ['year' => 2024, 'month' => 1],
                'compare' => ['year' => 2024, 'month' => 1]
            ],
            '' => [
                'expense' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ]
        ];

        return $queryMap;
    }

    // all query to get amount and compare
    private function getExpenses($queryStatus, $field, $type)
    {
        // dd( $field);
        $queryMap = $this->getQueryMap();

        $expenses = array_sum(
            Expense::whereYear('created_at', $queryMap[$queryStatus]['expense']['year'])
                ->when(isset($queryMap[$queryStatus]['expense']['month']), function ($query) use ($queryMap, $queryStatus) {
                    $query->whereMonth('created_at', $queryMap[$queryStatus]['expense']['month']);
                })
                ->whereIn('type', $type)
                ->pluck($field)
                ->toArray()
        );

        $compareAmount = array_sum(
            Expense::whereYear('created_at', $queryMap[$queryStatus]['compare']['year'])
                ->when(isset($queryMap[$queryStatus]['compare']['month']), function ($query) use ($queryMap, $queryStatus) {
                    $query->whereMonth('created_at', $queryMap[$queryStatus]['compare']['month']);
                })
                ->whereIn('type', $type)
                ->pluck($field)
                ->toArray()
        );

        $compare = ($compareAmount != 0) ? round((($expenses - $compareAmount) / $compareAmount) * 100, 2) : 0;

        return [$field . 'Compare' => $compare, $field . 'Expenses' => $expenses];
    }


    private function currentYearTax(){
        return Expense::whereYear('created_at', $this->thisYear)->sum('tax');

    }

    private function previousYearTax(){
        return Expense::whereYear('created_at', $this->lastYear)->sum('tax');
    }


    public function downloadInvoice($id)
    {
 
        // return $id;

        $expense = Expense::find($id);

        $filePath = $expense->file;

        if (!$filePath) {
            return back()->withError('File not found!');
        }

        return response()->download($filePath);

    }
}

