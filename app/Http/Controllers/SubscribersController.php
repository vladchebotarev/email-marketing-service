<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscribersListRequest;
use App\Imports\SubscribersImport;
use App\SubscribersList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class SubscribersController extends Controller
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
     * Show the application dashboard subscribers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subscribersLists = DB::select(
            'SELECT sl.id, sl.name, sl.description, sl.verified, sl.created_at, count(s.id) AS subscribers FROM subscribers_lists sl
                    INNER JOIN subscribers s ON sl.id = s.list_id
                    GROUP BY sl.id, sl.name, sl.description, sl.verified, sl.created_at
                    ORDER BY sl.created_at DESC'
        );

        $data = array(
            'subscribers_lists' => $subscribersLists,
        );

        return view('dashboard.subscribers', $data);
    }

    /**
     * Show the application dashboard subscribers.
     *
     * @param $list_id
     * @return \Illuminate\Http\Response
     */
    public function specificList($list_id)
    {
        $list = SubscribersList::find($list_id);
        if (!$list) {
            abort(404);
        }

        $subscribers = DB::table('subscribers')
            ->where('list_id', $list_id)
            ->select('email', 'first_name', 'last_name', 'company', 'created_at')
            ->get();

        $number_of_subscribers = $subscribers->count();

        $data = array(
            'list' => $list,
            'number_of_subscribers' => $number_of_subscribers,
            'subscribers' => $subscribers,
        );

        return view('dashboard.subscribers-specific-list', $data);
    }


    /**
     * Show the page of new list creation.
     *
     * @return \Illuminate\Http\Response
     */
    public function createListShow()
    {
        return view('dashboard.subscribers-create-list');
    }

    /**
     * Create new list of subscribers.
     *
     * @param CreateSubscribersListRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createList(CreateSubscribersListRequest $request)
    {
        $subscribersList = new SubscribersList();
        $subscribersList->name = $request->get('list_name');
        $subscribersList->description = $request->get('list_description');
        $subscribersList->user_id = Auth::user()->id;

        if ($request->get('verified') === 'on') {
            $subscribersList->verified = true;
        }

        DB::beginTransaction();

        try {
            $subscribersList->save();
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()
                ->with('SaveError', 'An error occurred while saving the data to data base. Try again!')
                ->withInput();
        }

        try {
            Excel::import(new SubscribersImport($subscribersList->id), request()->file('file_feed'));
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()
                ->with('SaveError', 'Your Excel file contains errors. Correct errors and еry again!')
                ->withInput();
        }

        DB::commit();

        return redirect('dashboard/subscribers')->with('success', 'The list was successfully created!');
    }
}
