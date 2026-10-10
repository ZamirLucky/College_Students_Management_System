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
        $request->validate(
            $this->getCollegeValidationRules(),
            $this->getCollegeValidationMessages()
        );

        College::create($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been created successfully');
    }

    /**
     * delete a college
    */
    public function destroy(College $college){
        $college->delete();
        return redirect()->route('colleges.index')->with('message', 'College has been deleted successfully!');
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
        $request->validate(
            $this->getCollegeValidationRules($college),
            $this->getCollegeValidationMessages()
        );

        $college->update($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been updated succesfully');
    }

    /**
     * Show a college deatils 
    */
    public function show(College $college){
        return view('colleges.show', Compact('college'));
    }

    /**
     * get the validation rules
    */
    public function getCollegeValidationRules($college = null){
        return [
            'name' => 'required|string||regex:/^[a-zA-Z]{3}/|unique:colleges,name' . ($college ? ',' . $college->id : ''),
            'address' => 'required|string|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s,.-]+$/',
        ];
    }

    /**
     * get the validation messages
    */
    public function getCollegeValidationMessages(){
        return [
            'name.unique' => 'The college name already exists',
            'address.regex' => 'The address must contain at least one letter and one number',
            'name.regex' => 'The name must begin with at least 3 letters.',
        ];
    }
}
