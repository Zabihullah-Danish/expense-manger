<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\ExpenseCategory;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        if(!request()->accounts){
            return view('expenses.index',compact('accounts'));
        }

        $selected_account = Account::find(request()->accounts);
        $selected_account_expenses = Expense::where('account_id', $selected_account->id)->get();
        return view('expenses.index',compact('selected_account_expenses','selected_account','accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ExpenseCategory::all();
        $accounts = Account::all();
        return view('expenses.create',compact('categories','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        // dd($request->all());
        Expense::create([
            'account_id' => $request->account_id,
            'expense_category' => $request->expense_category,
            'expense_title' => $request->expense_title,
            'description' => $request->description,
            'expense_amount' => $request->expense_amount,
        ]);

        return back()->with('message','Expense Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
