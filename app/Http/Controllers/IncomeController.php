<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Account;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\IncomeCategory;

class IncomeController extends Controller
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
            return view('incomes.index',compact('accounts'));
        }
        
        $selectedAccount = Account::find(request()->accounts);
        $selectedAccountIncome = Income::where('account_id',$selectedAccount->id)->get();
        
        return view('incomes.index',compact('accounts','selectedAccount','selectedAccountIncome'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = IncomeCategory::all();
        $accounts = Account::all();
        return view('incomes.create',compact('categories','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        // dd($request->all());
        Income::create([
            'account_id' => $request->account_id,
            'income_title' => $request->income_title,
            'income_category' => $request->income_category,
            'description' => $request->description,
            'income_amount' => $request->income_amount,
        ]);

        return back()->with('message','Record added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {   
        $categories = IncomeCategory::all();
        $account = $income->account;
        // dd($account);
        return view('incomes.edit',compact('income','categories','account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomeRequest  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->update([
            'account_id' => $request->account_id,
            'income_title' => $request->income_title,
            'income_category' => $request->income_category,
            'description' => $request->description,
            'income_amount' => $request->income_amount,
        ]);

        return back()->with('message','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
