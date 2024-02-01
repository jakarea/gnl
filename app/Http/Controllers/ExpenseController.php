<?php

namespace App\Http\Controllers;

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
    protected $filterLabels = [
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        'last7days' => 'Last 7 days',
        'thisMonth' => 'This Month',
        'thisYear' => 'This Year',
    ];

    public function index()
    {

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

        $data['expenses'] = $query->paginate(12)->appends(['filter' => $filter]);

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
        try {

            $data = $request->except(['file']);
            $expense = Expense::create($data);
            if ($request->hasFile('file')) {
                $avatar = $request->file('file');
                $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
                $avatarPath = $avatar->storeAs('expenses', $filename, 'public');
                $expense->update(['file' => 'storage/'. $avatarPath]);
            }

            return redirect('/expenses')->withSuccess('Expenses create successfuly!');

        }catch (\Exception $e) {

            return back()->withErrors('Failed to cread exense!!');
        }
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
}

