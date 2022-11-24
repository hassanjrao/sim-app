<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::where("added_by", auth()->id())->latest()->get();


        return view("employee.stores.index", compact("stores"));
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
            "name"=>"required|unique:stores,name",
            "address"=>"required|unique:stores,address",
            "city"=>"required",
            "telephone"=>"required",
            "post_code"=>"required",
        ]);

        Store::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "added_by"=>auth()->id(),
            "city"=>$request->city,
            "telephone"=>$request->telephone,
            "post_code"=>$request->post_code,

        ]);

        return redirect()->route("employee.stores.index")->withToastSuccess('Successfully Created');
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
        $store=Store::findOrFail($id);

        return view("employee.stores.edit", compact("store"));
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
        $store=Store::findOrFail($id);

        $request->validate([
            "name"=>"required|unique:stores,name,".$store->id,
            "address"=>"required|unique:stores,address,".$store->id,
            "city"=>"required",
            "telephone"=>"required",
            "post_code"=>"required",

        ]);

        $store->update([
            "name"=>$request->name,
            "address"=>$request->address,
            "city"=>$request->city,
            "telephone"=>$request->telephone,
            "post_code"=>$request->post_code,
        ]);

        return redirect()->route("employee.stores.index")->withToastSuccess('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store=Store::findOrFail($id);

        $store->delete();

        return redirect()->route("employee.stores.index")->withToastSuccess('Successfully Deleted');
    }
}
