<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::get();
        $input['subject'] = $this->mail_data['subject'];

        foreach ($users as $user) {
            $input['email'] = $user->email;
            $input['name'] = $user->name;

            Mail::send('mails.mail', array(
                'h1' => 'x',
                'body' => 'y'
            ), function($pesan) use($input){
                $pesan->to($input['email'], $input['name'])->subject($input['subject']);
                $pesan->from(env('MAIL_USERNAME','no.reply@mitrasistemsinergi.com'),'Bot mail Website');
            });
        }
    }
}
