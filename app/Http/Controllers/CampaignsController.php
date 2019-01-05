<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Http\Requests\SendCampaignRequest;
use App\Jobs\SendCampaignJob;
use App\SesVerifiedMail;
use App\Subscriber;
use App\SubscribersList;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CampaignsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard campaigns page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $campaigns = DB::select('SELECT c.id, c.subject, c.from_name, c.status, c.schedule_date, c.created_at, c.updated_at,
       svm.email AS from_email, t.name AS template, sl.name AS subscribers_list,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id) AS emails,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id AND se.opens <> 0) AS opens,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id AND se.clicks <> 0) AS clicks,
        (SELECT COUNT(s.id) FROM subscribers s WHERE s.list_id=sl.id) AS subscribers
        FROM campaigns c
        LEFT JOIN ses_verified_mails svm ON (c.from_email_id = svm.id)
        LEFT JOIN templates t ON (c.template_id = t.id)
        LEFT JOIN subscribers_lists sl ON (c.subscribers_list_id = sl.id)
        ORDER BY c.updated_at DESC');

        $data = array(
            'campaigns' => $campaigns,
        );

        return view('dashboard.campaigns', $data);
    }

    /**
     * Show the specific campaign page.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function specificCampaign($id)
    {
        $campaign_query = DB::select('SELECT c.id, c.subject, c.from_name, c.status, c.schedule_date, c.created_at, c.updated_at,
       svm.email AS from_email, t.id as template_id, t.name AS template, sl.id AS subscribers_list_id, sl.name AS subscribers_list,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id) AS emails,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id AND se.opens <> 0) AS opens,
        (SELECT COUNT(se.id) FROM sent_emails se WHERE se.campaign_id=c.id AND se.clicks <> 0) AS clicks,
        (SELECT COUNT(s.id) FROM subscribers s WHERE s.list_id=sl.id) AS subscribers
        FROM campaigns c
        LEFT JOIN ses_verified_mails svm ON (c.from_email_id = svm.id)
        LEFT JOIN templates t ON (c.template_id = t.id)
        LEFT JOIN subscribers_lists sl ON (c.subscribers_list_id = sl.id)
        WHERE c.id = ' . $id . '
        ORDER BY c.updated_at DESC');

        if (!$campaign_query) {
            return abort(404);
        }

        $campaign = $campaign_query[0];

        $open_rate = 0;
        $ctr = 0;

        if ($campaign->emails != 0) {
            $open_rate = round($campaign->opens / $campaign->emails * 100, 2);
            $ctr = round($campaign->clicks / $campaign->emails * 100, 2);
        }

        $emails = DB::table('sent_emails')
            ->where('campaign_id' , $id)
            ->select('id', 'recipient', 'opens', 'clicks', 'created_at')
            ->get();

        $clicks = DB::select('SELECT url, count(url) AS clicks FROM sent_emails_url_clicked 
                WHERE sent_email_id IN (SELECT id FROM sent_emails WHERE campaign_id = ' . $id . ')
                GROUP BY url ORDER BY count(url) DESC');

        $data = array(
            'campaign' => $campaign,
            'open_rate' => $open_rate,
            'ctr' => $ctr,
            'emails' => $emails,
            'clicks' => $clicks,
        );

        return view('dashboard.campaign-specific', $data);
    }

    /**
     * Show the specific campaign page.
     *
     * @param $email_id
     * @return \Illuminate\Http\Response
     */
    public function urlReport($email_id)
    {
        $campaign_query = DB::table('sent_emails')
            ->where('id' , $email_id)
            ->select('campaign_id')
            ->first();

        if (!$campaign_query) {
            abort(404);
        }

        $campaign_id = $campaign_query->campaign_id;

        $clicks = DB::table('sent_emails_url_clicked')
            ->where('sent_email_id' , $email_id)
            ->select('url', 'clicks', 'created_at', 'updated_at')
            ->get();

        $data = array(
            'email_id' => $email_id,
            'campaign_id' => $campaign_id,
            'clicks' => $clicks,
        );

        return view('dashboard.campaign-url-report', $data);
    }

    /**
     * Show the send new campaign page.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendCampaignShow()
    {

        $emails = SesVerifiedMail::orderBy('id')
            ->select('id', 'email')
            ->get();

        $subscribersLists = SubscribersList::where('verified', 1)
            ->orderBy('updated_at', 'desc')
            ->select('id', 'name')
            ->get();

        $templates = Template::orderBy('updated_at', 'desc')
            ->select('id', 'name')
            ->get();

        $data = array(
            'emails' => $emails,
            'subscribers_lists' => $subscribersLists,
            'templates' => $templates,
        );

        return view('dashboard.campaigns-send', $data);
    }


    /**
     * Send or schedule email campaign.
     *
     * @param SendCampaignRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendCampaign(SendCampaignRequest $request)
    {
        if ($subscribers = Subscriber::where('list_id', $request->get('subscribers_list'))->count()) {

            $campaign = new Campaign();
            $campaign->subject = $request->get('subject');
            $campaign->from_name = $request->get('from_name');
            $campaign->from_email_id = $request->get('from_email');
            $campaign->template_id = $request->get('template');
            $campaign->subscribers_list_id = $request->get('subscribers_list');
            $campaign->user_id = Auth::user()->id;

            DB::beginTransaction();

            if ($request->get('schedule') === 'on') {

                $schedule_date = $request->get('schedule_date') . ' ' . $request->get('schedule_time') . ':00';
                $campaign->scheduled = true;
                $campaign->schedule_date = $schedule_date;
                $campaign->status = 'Scheduled';

                try {
                    $campaign->save();
                } catch (\Exception $e) {
                    DB::rollBack();
                    return Redirect::back()
                        ->with('SaveError', 'An error occurred while sending the campaign. Contact the administrator!');
                }
                DB::commit();
                return redirect('dashboard/campaigns')->with('success', 'The campaign was successfully scheduled!');
            } else {
                $campaign->status = 'Sending';

                try {
                    $campaign->save();
                    SendCampaignJob::dispatch($campaign->id)
                        ->onConnection('sqs')
                        ->onQueue('MilanoCampaignQueue');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return Redirect::back()
                        ->with('SaveError', 'An error occurred while sending the campaign. Contact the administrator!');
                }
                DB::commit();
                return redirect('dashboard/campaigns')->with('success', 'The campaign was successfully sent!');
            }

        } else {
            return Redirect::back()
                ->with('SaveError', 'An error occurred while sending the campaign. This list does not exist or empty!');
        }
    }

    /**
     * Send or schedule email campaign.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCampaign(Request $request)
    {
        $campaign = Campaign::find($request->get('campaign_id'));

        if (!$campaign) {
            abort(404);
        }

        if ($campaign->status != 'Scheduled') {
            return Redirect::back();
        }

        DB::beginTransaction();

        try {
            $campaign->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()
                ->with('SaveError', 'An error occurred while removing the campaign. Contact the administrator!');
        }

        DB::commit();
        return redirect('dashboard/campaigns')->with('success', 'The campaign was successfully removed!');
    }
}
