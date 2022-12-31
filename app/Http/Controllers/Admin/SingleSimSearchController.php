<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SingleSimSearch;
use Illuminate\Http\Request;

class SingleSimSearchController extends Controller
{
    public function index(){

        $singleSimSearches = SingleSimSearch::with(["scannedBy","systemSim"])->latest()->get();

        return view("admin.single-sim-search.index", compact("singleSimSearches"));
    }
}
