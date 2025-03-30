<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    //Show list of all collages 
    public function index(){
        $colleges = College::query();
        $colleges = $colleges->get();

        return view('colleges.index', compact('colleges'));
    }

    /**
     * create a new college
    */
    public function create(){
        return view('colleges.create');
    }

    /**
     * Store the form data
    */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:colleges,name',
            'address' => 'required|string',
        ]);

        College::create($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been created successfully');
    }

    /**
     * delete a college
    */
    public function destroy(College $college){
        $college->delete();
        return redirect()->route('colleges.index')->with('message', 'College deleted successfully!');
    }
}
