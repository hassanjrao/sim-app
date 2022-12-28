<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MultipleSimSearch;
use App\Models\Sim;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user = Auth::user();

        if ($user->hasRole("admin")) {


            $totalStores=Store::all()->count();
            $totalEmployees=Employee::all()->count();

            $totdayActivityLogs=DB::table("authentication_log")->whereDate("login_at",date("Y-m-d"))->count();

            $totalSims=Sim::all()->count();

            $multipleSimSearches=MultipleSimSearch::count();


            return view("admin.dashboard",compact("totalStores","totalEmployees","totdayActivityLogs","totalSims","multipleSimSearches"));

        } elseif ($user->hasRole("employee")) {


            $totalStores=Store::where("added_by",$user->id)->count();
            $totalSims=Sim::where("added_by",$user->id)->count();

            $multipleSimSearches=MultipleSimSearch::where("scanned_by",$user->id)->count();

            return view("employee.dashboard",compact("totalStores","totalSims","multipleSimSearches"));
        }
    }
}
