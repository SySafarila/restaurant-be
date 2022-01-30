<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail as SendEmail;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail()
    {
        $users = User::get();

        foreach ($users as $user) {
            $mail_data = [
                'subject' => 'New message subject.',
                'email' => $user->email
            ];

            SendEmail::dispatch($mail_data)->delay(now()->addSeconds(30));
        }

        dd('Job dispatched.');
    }
}
