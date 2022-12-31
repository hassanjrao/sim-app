<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Sim;
use App\Models\SingleSimSearch;
use App\Models\SystemSim;
use Illuminate\Http\Request;

class SingleSimSearchController extends Controller
{
    public function index()
    {

        return view("employee.single-sim-search.index");
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

        $store_name = "";
        $store_id="";

        $storeSim = Sim::where("sim_number", $sim_number)->first();

        if ($storeSim) {
            $store_name = $storeSim->store ? $storeSim->store->name : "";
            $store_id = $storeSim->store ? $storeSim->store->id : "";
        }


        /*
            Single Sim SearSingleSimSearchch:

            The employee will go to store in second visit, scan the sim,
            the system will identify whether the scanned sim belong to KYA or other company.

            The admin will be able to see the scanned location, and the sim identity and the employee who scanned the sim
        */

        $sim = SystemSim::where("ssn", $sim_number)->first();

        if (!$sim) {

            $sim = SystemSim::create([
                "ssn" => $sim_number,
                "company" => "Other"
            ]);

            SingleSimSearch::create([
                "system_sim_id" => $sim->id,
                "lat" => $lat,
                "lng" => $lng,
                "scanned_by" => auth()->user()->id
            ]);

            return response()->json([
                "status" => "Success",
                "message" => "Sim found",
                "data" => [
                    "sim_number" => $sim_number,
                    "store_name" => $store_name,
                    "store_id" => $store_id,
                    "sim_identity" => $sim->company,
                ]

            ], 200);
        }

        SingleSimSearch::create([
            "system_sim_id" => $sim->id,
            "lat" => $lat,
            "lng" => $lng,
            "scanned_by" => auth()->user()->id
        ]);



        return response()->json([
            "status" => "Success",
            "message" => "Sim found",
            "data" => [
                "sim_number" => $sim_number,
                "store_name" => $store_name,
                "store_id" => $store_id,
                "sim_identity" => $sim->company,
            ]

        ], 200);
    }
}
