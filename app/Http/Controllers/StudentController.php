<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //Get all the List of Students

        $student = Student::all();

       
        return view('students')->with('students', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Upload Student Passport


        //Check if file has Passport
        if($request->hasFile('student_passport')){

            //Get the Original name of the Pasport
            $originalName = $request->student_passport->getClientOriginalName();

            //Get the Name of the File without Extension
            $newName = pathinfo($originalName, PATHINFO_FILENAME);

            //Get the Extension of the File
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            //Add Prefix to the name
            $prefixedName = $newName.'_Passport.'.$extension;

            //Store the Image
            $request->student_passport->storeAs('students_passports', $prefixedName, 'public');

            
        }




        //Validate Form request
        $validate = $request->validate([
            'student_name' => 'required | min:5',
            'student_passport' => 'required | mimes:jpg,png',
            'student_age' => 'required | integer',
            'student_class' => 'required | min:3',
            'guardian_email' => 'required | Email'
        ]);

            //Store in Database
        $student = new Student;

        $student->name = $request->student_name;
        $student->passport_photograph = $prefixedName;
        $student->age = $request->student_age;
        $student->class = $request->student_class;
        $student->Guardian_email = $request->guardian_email;

        $student->save();

        //if Save is Successful
       if($student->save()){
        return back()->with('status', 'Registration Successful');
       }else{
           return back()->with('error', 'Registration Failed');
       }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $id)
    {
        //return students Profile
        $student_data = Student::find($id);

        // dd($student_data);

        //Return a View
        return view('student-profile')->with(['student_data' => $student_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        //Edit Student
        $student = Student::find($id);

        //return view
        return view('edit-student')->with(['student'=> $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
