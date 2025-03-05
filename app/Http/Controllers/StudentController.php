<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Show the details for all students.
     */
    public function index() {
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Compuses', ''); // Fetch colleges

        if (request('college_id') == null) {
            $students = Student::all();
        } else {
            $students = Student::where('college_id', request('college_id'))->get();
        }

        return view('students.index', compact('students', 'colleges'));
    }
    /**
     * Show the details for a specific student.
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * create a new student
     */
    public function create() {
        $colleges = College::orderBy('name')->pluck('name', 'id'); // Fetch colleges
        return view('students.create', compact('colleges')); // Pass to view
    }

    /**
     * store the form data
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|regex:/^[0-9]{8}$/',
            'dob'=> 'required|date|before:-15 years',
            'college_id' => 'required|exists:colleges,id'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('message', 'Student has been created successfully');
    }
}
