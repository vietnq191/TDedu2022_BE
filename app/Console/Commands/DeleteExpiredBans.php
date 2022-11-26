<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Cog\Laravel\Ban\Models\Ban;
use Illuminate\Console\Command;

class DeleteExpiredBans extends Command
{
    protected $userRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ban:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired of ban user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Ban::where('expired_at', '<', Carbon::now())->each(function ($item) {
            $item->delete();
            if($item->bannable_type == User::class)
            {
                $this->userRepo->updateUser($item->bannable_id, ['status' => 'Active']);
            }
        });
    }
}
