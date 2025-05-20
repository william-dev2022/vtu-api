<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CableplanRsource;
use App\Http\Resources\DataPlanResource;
use App\Http\Resources\ExamPlanResource;
use App\Http\Resources\TransactionResource;
use App\Models\CablePlan;
use App\Models\DataPlan;
use App\Models\ExamPinPlan;
use App\Models\ExamPlan;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //

    public function services()
    {
        $services =  Service::orderBy('status')->get();


        return response()->json([
            'services' => $services
        ], 200);
    }


    public function init(Request $request)
    {
        $balance =  $request->user()->balance();
        $limit = 20;

        $transactions = Transaction::where('user_id', $request->user()->id)
            ->orderByDesc('created_at')
            ->take($limit)
            ->get();

        $services = Service::orderBy('status')->get();

        return response()->json([
            'transactions' => TransactionResource::collection($transactions),
            'balance' => $balance,
            'services' => $services

        ], 200);
    }


    public function data_plans()
    {

        $activePlans = DataPlan::where('status', 'active')->get();

        // Get unique network names
        $networks = $activePlans->pluck('network')->unique()->values();

        $data_plans = $activePlans->groupBy('network')->map(function ($plans) {
            return DataPlanResource::collection($plans);
        });

        return response()->json([
            'networks' => $networks,
            'plans' =>  $data_plans
        ], 200);
    }

    public function cable_plans()
    {
        $activePlans = CablePlan::where('status', 'active')->get();
        $providers = $activePlans->pluck('provider')->unique()->values();

        $cable_plans = $activePlans->groupBy('provider')->map(function ($plans) {
            return CableplanRsource::collection($plans);
        });


        return response()->json([
            'providers' => $providers,
            'plans' =>  $cable_plans,

        ], 200);
    }


    public function exam_plans()
    {
        $activePlans = ExamPlan::where('status', 'active')->get();
        $providers = $activePlans->pluck('provider')->unique()->values();

        $exam_pin_plans = $activePlans->groupBy('provider')->map(function ($plans) {
            return ExamPlanResource::collection($plans);
        });
        return response()->json([
            'providers' => $providers,
            'plans' =>  $exam_pin_plans,

        ], 200);
    }
}
