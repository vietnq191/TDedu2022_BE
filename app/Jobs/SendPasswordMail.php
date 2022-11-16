<?php

namespace App\Jobs;

use App\Mail\UserPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPasswordMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $full_name;
    protected $email;
    protected $password;
    public $timeout = 7200; // 2 hours


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($full_name, $email, $password)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new UserPassword($this->full_name, $this->email, $this->password));
    }
}
