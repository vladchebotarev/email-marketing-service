<?php

namespace App\Jobs;

use App\Campaign;
use App\Mail\MailCampaign;
use App\Notifications\SlackErrorNotification;
use App\Notifications\SlackSuccessNotification;
use App\Subscriber;
use App\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 1800;

    protected $campaign_id;

    /**
     * Create a new job instance.
     *
     * @param $campaign_id
     */
    public function __construct($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email_object = DB::table('campaigns')
            ->where('campaigns.id', $this->campaign_id)
            ->leftJoin('ses_verified_mails', 'campaigns.from_email_id', '=', 'ses_verified_mails.id')
            ->leftJoin('templates', 'campaigns.template_id', '=', 'templates.id')
            ->leftJoin('subscribers_lists', 'campaigns.subscribers_list_id', '=', 'subscribers_lists.id')
            ->select('campaigns.id', 'campaigns.subject', 'campaigns.from_name', 'ses_verified_mails.email as from_email',
                'templates.content as template', 'campaigns.subscribers_list_id')
            ->first();

        /**/

        $subscribers = Subscriber::where('list_id', $email_object->subscribers_list_id)
            ->select('email')
            ->get();

        foreach ($subscribers as $subscriber){
            $message = (new MailCampaign($email_object))
                ->onConnection('sqs')
                ->onQueue('MilanoEmailQueue');

            Mail::to($subscriber->email)
                ->queue($message);
        }

        $campaign = Campaign::find($this->campaign_id);
        $campaign->status = 'Complete';
        $campaign->save();

        $user = User::find(1);
        $user->notify(new SlackSuccessNotification('Campaign ' . $this->campaign_id . ' sent successfully.'));
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        $campaign = Campaign::find($this->campaign_id);
        $campaign->status = 'Failed';
        $campaign->exception_message = $exception->getMessage();
        $campaign->save();

        $user = User::find(1);
        $user->notify(new SlackErrorNotification('Campaign ' . $this->campaign_id . ' send failed. ' . $exception->getMessage()));
        // Send user notification of failure, etc...
        //echo $exception->getMessage();
    }
}
