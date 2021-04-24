<?php

namespace App\Http\Controllers;

//Bring in our Model
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportMail;

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
       
    
        //Send to Parents Email
        Mail::to($parent_email)->send(new ReportMail($student->report));

        return redirect()->back()->with('status', 'Operation Successful, Report Sent to Parent');
        
    }
}
