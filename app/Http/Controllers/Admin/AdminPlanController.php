<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CablePlan;
use App\Models\DataPlan;
use App\Models\ExamPlan;
use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPlan = DataPlan::all();
        $cablePlan = CablePlan::all();
        $examPlan = ExamPlan::all();



        $plans['data'] = $dataPlan;
        $plans['cable'] = $cablePlan;
        $plans['exam'] = $examPlan;

        return view('admin.plans.index')->with('plans', $plans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
