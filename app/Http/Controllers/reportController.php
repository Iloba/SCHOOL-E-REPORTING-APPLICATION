<?php

namespace App\Http\Controllers;

//Bring in our Model
use App\Models\Student;

use Illuminate\Http\Request;

class reportController extends Controller
{
    //Send Report
    public function sendreport(Request $request, $id){
        $student = Student::find($id);

        //Update the Report Field
        $student->report = $request->report;

        $student->save();

        //Send Report to Parents Email;


        //Get Parents Email
       $parent_email = $student->Guardian_email;
       
       dd($parent_email);



        //Send to Parents Email
    }
}
