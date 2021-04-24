<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Student;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    // protected $student = Student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {   
        // $this->student = $student;
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
