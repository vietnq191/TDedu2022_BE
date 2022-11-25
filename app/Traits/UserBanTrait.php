<?php

namespace App\Traits;

use App\Models\Ban;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait UserBanTrait
{
    public function banUser($user, $attributes, $created_by_user)
    {
        DB::beginTransaction();
        try {
            //Ban user
            $userBan = $user->ban([
                'comment' => $attributes['reason_ban'] ?? null,
                'expired_at' => convertDurationBan($attributes['duration']),
            ]);
            $userBan->duration = convertDurationToSave($attributes['duration']);
            $userBan->created_by_id = $created_by_user?->id;
            $userBan->created_by_type = $created_by_user?->getMorphClass();

            $userBan->save();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function getTimeRemaining($time)
    {
        try {
            if (Carbon::now() >= $time) {
                return 0;
            }
            return Carbon::now()->diffInMinutes($time);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getListBan($user_id)
    {
        return Ban::where('bannable_id', $user_id)->get();
    }
}
