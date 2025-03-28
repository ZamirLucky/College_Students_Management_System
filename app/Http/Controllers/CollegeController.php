<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    //index to list all collages 
    public function index(){
        $colleges = College::query();
        $colleges = $colleges->get();

        return view('colleges.index', compact('colleges'));
    }
}
