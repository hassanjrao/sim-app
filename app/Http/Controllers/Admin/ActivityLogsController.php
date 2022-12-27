<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class ActivityLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $logs= DB::table('users')
       ->join("authentication_log as  al","users.id","=","al.authenticatable_id")
       ->select("users.name","al.*")
       ->orderBy("al.id","desc")
       ->get();

       $logs= $logs->map(function($log){
           $log->login_at=$log->login_at ? date("d-m-Y h:i:s",strtotime($log->login_at)) : "-";
           $log->logout_at=$log->logout_at ? date("d-m-Y h:i:s",strtotime($log->logout_at)) : "-";
           $agent=  tap(new Agent, fn($agent) => $agent->setUserAgent($log->user_agent));
           $log->browser= $agent->platform() . ' - ' . $agent->browser();

           $location=(json_decode($log->location,true));

           $log->ip=$location ? $location["ip"] : "-";
           $log->lat=$location ? $location["lat"] : "-";
              $log->lon=$location ? $location["lon"] : "-";


           return $log;
         });




        return view("admin.activity-logs.index",compact("logs"));

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
        //
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
