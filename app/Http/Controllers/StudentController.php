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
        $student = new Student();
        return view('students.create', compact('colleges', 'student')); // Pass to view
    }

    /**
     * store the form data
    */
    public function store(Request $request)
    {
        $request->validate(
            $this->getStudentValidationRules(),
            $this->getStudentValidationMessages()
        );

        
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
        $request->validate(
            $this->getStudentValidationRules($student),
            $this->getStudentValidationMessages()
        );

        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been updated successfully!');
    }

    /**
     * delete a student
    */
    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('message', 'Student deleted successfully!');
    }

    /**
     * Get the validation rules for student creation and update.
     */
    private function getStudentValidationRules($student = null)
    {
        return [
            'name'       => 'required|string|max:100|min:3|regex:/^[a-zA-Z\s]+$/',
            'email'      => $student 
                            ? 'required|email|unique:students,email,' . $student->id 
                            : 'required|email|unique:students,email',
            'phone'      => 'required|string|regex:/^[0-9]{8}$/',
            'dob'        => 'required|date|before:-15 years',
            'college_id' => 'required|exists:colleges,id'
        ];
    }

    private function getStudentValidationMessages()
    {
        return [
            'dob.before'      => 'The date of birth must be at least 15 years ago.',
            'phone.regex'     => 'The phone number must be exactly 8 digits.',
            'name.regex'      => 'The name must only contain letters and spaces.',
            'college_id.required' => 'The college field is required.',
            'dob.required'    => 'The date of birth field is required.',
            'name.max'        => 'The name may not be greater than 100 characters.',
            'email.max'       => 'The email may not be greater than 255 characters.',
            'name.min'        => 'The name must be at least 3 characters.',
            'email.email'     => 'The email must be a valid email address.'
        ];
    }
}
