<?php

namespace App\Jobs;

use App\Mail\MilanoMailCampaign;
use App\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendCampaignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    protected $subscribersListID;

    /**
     * Create a new job instance.
     *
     * @param $subscribersListID
     */
    public function __construct($subscribersListID)
    {
        $this->subscribersListID = $subscribersListID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = Subscriber::where('list_id', $this->subscribersListID)
            ->select('email')
            ->get();

        foreach ($subscribers as $subscriber){
            try {
                Mail::to($subscriber->email)
                    ->send(new MilanoMailCampaign());
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
