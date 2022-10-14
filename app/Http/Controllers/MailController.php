<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()

    {

        $details = [

            'title'=> 'Mail from drugs',

            'body' => 'This is for test email'

        ];



        Mail::to("codingwithaz@gmail.com")->send(new TestMail($details));

        return "Email sent";

    }
}
