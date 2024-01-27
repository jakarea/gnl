<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Expense\ExpenseRequest;

class ApiExpenseController extends ApiController
{
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $expenses = Expense::orderByDesc('expense_id')->get();
        return $this->jsonResponse(false, $this->success,$expenses,$this->emptyArray, JsonResponse::HTTP_OK);
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

            // return $request->all();

            // use it if image is 64 bits
            // $file    = explode(';', $request->image);
            // $file    = explode('/', $file[0]);
            // $file_ex = end($file);
            // $filename = substr(md5(time()), 0, 10) . '.' . $file_ex;

            // or

            // $strpos      = strpos($request->image, ';');
            // $substr      = substr($request->image, 0, $strpos);
            // $file_ext    = explode('/', $substr)[1];
            // $filename    = substr(md5(time()), 0, 10) . "." . $file_ext;


            $data = $request->except(['file']);

            $expense = Expense::create($data);

            if ($request->hasFile('file')) {
                $avatar = $request->file('file');
                $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
                $avatarPath = $avatar->storeAs('expenses', $filename, 'public');
                $expense->update(['file' => $avatarPath]);
            }

            return $this->jsonResponse(false, 'Expense created successfully', $expense, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create expense', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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

