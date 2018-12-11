<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendCampaignRequest;
use App\Jobs\SendCampaignJob;
use App\Mail\MilanoMailCampaign;
use App\Subscriber;
use App\SubscribersList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        return view('dashboard.campaigns');
    }


    /**
     * Show the send new campaign page.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendCampaignShow()
    {

        $subscribersLists = SubscribersList::where('verified', 1)
            ->orderBy('updated_at', 'desc')
            ->select('id', 'name')
            ->get();

        $data = array(
            'subscribers_lists' => $subscribersLists,
        );

        return view('dashboard.campaigns-send', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendCampaign(SendCampaignRequest $request)
    {
        if($subscribers = Subscriber::where('list_id', $request->get('subscribers_list'))->count()){
            try {
                SendCampaignJob::dispatch($request->get('subscribers_list'));
            } catch (\Exception $e) {
                return Redirect::back()
                    ->with('SaveError', 'An error occurred while sending the campaign. Contact the administrator!');
            }

            return redirect('dashboard/campaigns')->with('success', 'The campaign was successfully sent!');
        } else {
            return Redirect::back()
                ->with('SaveError', 'An error occurred while sending the campaign. This list does not exist!');
        }

    }
}
