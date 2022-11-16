<?php

namespace App\Traits;

trait SendMailTrait
{
    public function sendPassword($full_name, $email, $password)
    {
        try {
            $job = (new \App\Jobs\SendPasswordMail($full_name, $email, $password))
                ->delay(now()->addSeconds(2));
            dispatch($job);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
