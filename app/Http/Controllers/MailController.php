<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail as SendEmail;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $users = User::get();

        $n = 20;

        foreach ($users as $user) {
            $mail_data = [
                'subject' => 'New message subject.',
                'email' => $user->email
            ];

            // usleep(20000);
            // sleep(30);
            $job = (new SendEmail($mail_data));

            dispatch($job)->delay(now()->addSeconds(2));
            $n = rand(20,40);
            // SendEmail::dispatch($job)->delay(now()->addSeconds(30));
        }

        dd('Job dispatched.');
    }
}
