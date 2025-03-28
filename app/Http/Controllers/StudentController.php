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

        // Start a query builder for students
        $students = Student::query();

        // Apply college filter if selected
        if (request()->has('college_id') && request('college_id') !== null) {
            $students->where('college_id', request('college_id'));
        }
 
        // Apply sorting
        if (request('sort') == 'name_asc'){
            $students->orderBy('name', 'asc');
        }elseif (request('sort') == 'name_desc'){
            $students->orderBy('name', 'desc');
        }

        // Get the final list of students
        $students = $students->get();

        return view('students.index', compact('students', 'colleges'));
    }
    /**
     * Show the details for a specific student.
     */
    public function show(Student $student)
    {
        // $student = Student::find($id);
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
        ],
        [
            'dob.before' => 'The date of birth must be at least 15 years ago.',
            'phone.regex' => 'The phone number must be exactly 8 digits.'
        ]);

        //dd($request->all());
        // $requestData = $request->all();
        // $requestData['dob'] = Carbon::parse($request->dob)->format('Y-m-d');

        Student::create($request->all());
        return redirect()->route('students.index')->with('message', 'Student has been created successfully');
    }

    /****
     * Show the edit form
    */
    public function edit(Student $student){
        $colleges = College::orderBy('name')->pluck('name', 'id'); // Fetch colleges
        return view('students.edit', compact('student', 'colleges')); // Pass to view
    }

    // Process the update request
    public function update(Request $request, Student $student){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|regex:/^[0-9]{8}$/',
            'dob' => 'required|date|before:-15 years',
            'college_id' => 'required|exists:colleges,id'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student updated successfully!');
    }

    /**
     * delete a student
    */
    public function destroy(Student $student){
       // $student_id = Student::find($student);
        $student->delete();
        return redirect()->route('students.index')->with('message', 'Student deleted successfully!');
    }
}
