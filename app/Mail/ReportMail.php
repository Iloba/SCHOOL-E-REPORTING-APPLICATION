<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Student;
use App\Http\Controllers\reportController;
use Illuminate\Http\Request;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student)
    {   
        $this->student = $student;
        
        // dd($this->student);
       

        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
      
        return 
        $this->from('info@ereporting.com')->view('emails.report');
    } 
}
