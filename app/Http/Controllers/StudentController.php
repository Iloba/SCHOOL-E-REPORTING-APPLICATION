<?php

namespace App\Http\Controllers;
use Auth;

use App\Models\Student;
use Illuminate\Http\Request;

//To Store, Use the Storage Facade
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

     //Apply Middleware
     public function __construct(){
         $this->middleware('auth');
     }
     
    public function index()
    {


        //Get all the List of Students for Specific User

        $student = auth()->user()->students()->orderBy('created_at', 'desc')->paginate(5);

       
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
            $prefixedName = $request->student_name.'_Passport.'.$extension;

            //Store the Image
            $request->student_passport->storeAs('students_passports', $prefixedName, 'public_uploads');

            
        }




        //Validate Form request
        $validate = $request->validate([
            'student_name' => 'required | min:5',
            'gender' => 'required | not_in:0',
            'student_school' => 'required | min:5',
            'student_passport' => 'required | mimes:jpg,png',
            'student_age' => 'required | integer',
            'student_class' => 'required | min:3',
            'guardian_name' => 'required | min:5',
            'guardian_email' => 'required | Email'
        ]);

            //Store in Database
        $student = new Student;

        $student->name = $request->student_name;
        $student->gender = $request->gender;
        $student->school = $request->student_school;
        $student->user_id = Auth::user()->id;
        $student->passport_photograph = $prefixedName;
        $student->age = $request->student_age;
        $student->class = $request->student_class;
        $student->Guardian_name = $request->guardian_name;
        $student->Guardian_email = $request->guardian_email;

        $student->save();

        //if Save is Successful
       if($student->save()){
        return redirect(route('students_list'))->with('status', 'Registration Successful');
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
    public function show($id)
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
        $students_data = Student::find($id);

        //return view
        return view('edit-student')->with(['students_data'=> $students_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    //Delete Old Image
   



    public function update(Request $request, $id)
    {
        //update Student Record

        //Upload Passport
        //Check if file has Passport
        if($request->hasFile('student_passport')){

            //Get the Original name of the Pasport
            $originalName = $request->student_passport->getClientOriginalName();

            //Get the Name of the File without Extension
            $newName = pathinfo($originalName, PATHINFO_FILENAME);

            //Get the Extension of the File
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            //Add Prefix to the name
            $prefixedName = $request->student_name.'_Passport.'.$extension;

            //Store the Image
            $request->student_passport->storeAs('students_passports', $prefixedName, 'public_uploads');

            
        }
       
        //Validate
        $validate = $request->validate([
            'student_name' => 'required | min:5',
            'student_passport' => 'required | mimes:jpg,png',
            'student_age' => 'required | integer',
            'student_class' => 'required | min:3',
            'guardian_email' => 'required | Email'
        ]);

        //update Student Record
        $student = Student::find($id);

         

        $student->name = $request->student_name;
        $student->passport_photograph = $prefixedName;
        $student->age = $request->student_age;
        $student->class = $request->student_class;
        $student->Guardian_email = $request->guardian_email;

        //Delete Previously Uploaded Image
        // if(file_exists($request->passport_photograph)){
        //    Storage::delete('/public/students_passports/'.$student->passport_photograph);
        //   }

        $student->save();

          return redirect(route('students_profile', $student->id))->with('status', 'Record Successfully Updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Student
        $student = Student::find($id);

        $student->delete();

        return back()->with('status', 'Delete Successful');


        
    }
}
