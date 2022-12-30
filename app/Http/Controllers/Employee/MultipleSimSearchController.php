<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\MultipleSearchSim;
use App\Models\MultipleSimSearch;
use App\Models\Sim;
use App\Models\SystemSim;
use Illuminate\Http\Request;

class MultipleSimSearchController extends Controller
{
    public function index()
    {
        return view("employee.multiple-sim-search.index");
    }

    public function scanSim(Request $request)
    {

        $request->validate([
            "sim_number" => "required",
            "lat" => "nullable",
            "lng" => "nullable"

        ]);

        $sim_number = $request->sim_number;
        $lat = $request->lat;
        $lng = $request->lng;


        /*
            Multiple Sim Search:

            The employee will go to store in second visit, scan the sim,
            the system will identify whether the scanned sim belong to KYA or other company.

            The admin will be able to see the scanned location, and the sim identity and the employee who scanned the sim
        */

        $sim = SystemSim::where("ssn", $sim_number)->first();

        if(!$sim){

           $sim= SystemSim::create([
                "ssn" => $sim_number,
                "company" => "Other"
            ]);

            MultipleSimSearch::create([
                "system_sim_id" => $sim->id,
                "lat" => $lat,
                "lng" => $lng,
                "scanned_by" => auth()->user()->id
            ]);

            return response()->json([
                "status" => "Success",
                "message" => "Sim found",
                "data"=>[
                    "sim_number"=>$sim_number,
                    "store_name"=>"",
                    "sim_identity"=>"Other",
                ]

            ],200);
        }

        MultipleSimSearch::create([
            "system_sim_id" => $sim->id,
            "lat" => $lat,
            "lng" => $lng,
            "scanned_by" => auth()->user()->id
        ]);

        // $store_name = $sim->store ? $sim->store->name : "";


        return response()->json([
            "status" => "Success",
            "message" => "Sim found",
            "data"=>[
                "sim_number"=>$sim_number,
                "store_name"=>"",
                "sim_identity"=>"KYA",
            ]

        ],200);

    }
}
