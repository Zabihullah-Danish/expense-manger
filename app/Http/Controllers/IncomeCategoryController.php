<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_categories = IncomeCategory::all();
        return view('categories.incomes.index', compact('income_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeCategoryRequest $request)
    {
        $income = $request->income_category;
        // dd($income);
        IncomeCategory::create([
            'name' => $income,
        ]);
        return back()->with('message','Category added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomeCategoryRequest  $request
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $incomeCategory)
    {
        //
    }
}
