<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Sim;
use App\Models\Store;
use Illuminate\Http\Request;

class SimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stores = Store::all();
        $sims= Sim::where("added_by", auth()->user()->id)->latest()->with(["store","addedBy"])->get();
        return view("employee.sims.index", compact("stores", "sims"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view("employee.sims.create", compact("stores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "sim_numbers" => "required",
            "store_id" => "required",
            "lat"=>"nullable",
            "lng"=>"nullable"

        ],[
            "sim_numbers.required" => "Please add sim numbers",
            "store_id.required" => "Please select store",
        ]);


        $sim_numbers=$request->sim_numbers;

        $simData=[];

        foreach ($sim_numbers as $sim_number) {

            $simData[] = [
                "sim_number" => $sim_number,
                "store_id" => $request->store_id,
                "added_by" => auth()->user()->id,
                "scanned_lat"=>$request->lat,
                "scanned_long"=>$request->lng,
                "created_at" => now(),
                "updated_at" => now(),
            ];

        }

        Sim::insert($simData);

        return redirect()->route("employee.sims.index")->with("success", "Sims added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
