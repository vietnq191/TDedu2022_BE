<?php

namespace App\Traits;

trait SendNotificationToTelegramTrait
{
    public function SendNotificationToTelegram($message)
    {
        try {
            $job = (new \App\Jobs\SendNotificationToTelegramJob($message))
                ->delay(now()->addSeconds(2));
            dispatch($job);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
