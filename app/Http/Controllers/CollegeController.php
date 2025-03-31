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
        $college = new College;
        return view('colleges.create', Compact('college'));
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

    /**
     * display edit form
    */
    public function edit(College $college){
        return view('colleges.edit', Compact('college')); // pass to view
    }

    /*
     * process the update form
    */
    public function update(College $college, Request $request){
        $request->validate([
            'name' => 'required|string|unique:colleges,name',
            'address' => 'required|string',
        ]);

        $college->update($request->all());
        return redirect()->route('colleges.index')->with('message', 'College updated succesfully');
    }

    /**
     * Show a college deatils 
    */
    public function show(College $college){
        return view('colleges.show', Compact('college'));
    }
}
