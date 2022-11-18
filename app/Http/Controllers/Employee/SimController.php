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
        $stores = Store::where("added_by", auth()->user()->id)->get();
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
        //
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

        ]);


        $sim_numbers = explode(",", $request->sim_numbers);

        foreach ($sim_numbers as $sim_number) {
            $sim = new Sim();
            $sim->sim_number = $sim_number;
            $sim->store_id = $request->store_id;
            $sim->added_by = auth()->user()->id;
            $sim->scanned_lat = $request->lat;
            $sim->scanned_long = $request->lng;
            $sim->save();
        }

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
