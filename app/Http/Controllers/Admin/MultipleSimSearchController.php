<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MultipleSimSearch;
use Illuminate\Http\Request;

class MultipleSimSearchController extends Controller
{
    public function index(){

        $multipleSimSearches = MultipleSimSearch::with(["user","sim","sim.store"])->latest()->get();

        return view("admin.multiple-sim-search.index", compact("multipleSimSearches"));
    }
}
