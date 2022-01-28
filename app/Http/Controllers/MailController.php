<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail as SendEmail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $mail_data = [
            'subject' => 'New message subject.'
        ];

        $job = (new SendEmail($mail_data))->delay(now()->addSeconds(10));

        dispatch($job);

        dd('Job dispatched.');
    }
}
