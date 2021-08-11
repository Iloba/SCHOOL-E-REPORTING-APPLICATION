<?php

namespace App\Http\Controllers;

//Bring in our Model
use Exception;

use App\Models\Student;
use App\Mail\ReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class reportController extends Controller
{
    //Send Report
    public function sendreport(Request $request, $id){

       

        //Validate form
        $request->validate([
            'report' => 'required',
            'report_file' => 'mimes:pdf,docx,jpeg,png|max:10120'
        ]);

       

        $student = Student::find($id);


          //Upload File
          if($request->has('report_file')){

            //Get the Original Name
            $originalName = $request->report_file->getClientOriginalName();


            //Get the name without Extension
            $nameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);

            

            //Get Extension
            $nameWithExt = pathinfo($originalName, PATHINFO_EXTENSION);


            //Add Prefix (Create Name you want to Store in Database)
            $prefixedName = $student->name.'_report_file.'.$nameWithExt;

           
            //Store
            $request->report_file->storeAs('report-files', $prefixedName, 'public_uploads');

            //Check if Upload is Successful
        }


        

        //Store 

        //Update the Report Field
        $student->report = $request->report;
        $student->report_file = $prefixedName;

       

        $student->save();

        

        //Send Report to Parents Email;
       

        //Get Parents Email
       $parent_email = $student->Guardian_email;
       
    
        //Send to Parents Email
        try {
            Mail::to($parent_email)->send(new ReportMail(['students' => $student]));
            return redirect()->back()->with('status', 'Operation Successful, Report Sent to Parent Email Address ');
            
        } catch (Exception $error) {
            return back()->with('error', 'Something went wrong, could NOT send email please try again');
        }
       

       
        
    }
}
