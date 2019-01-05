<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $statistics_array = DB::select(
            'SELECT (SELECT count(id) FROM campaigns) AS campaigns, 
                    (SELECT count(id) FROM sent_emails) AS emails, 
                    (SELECT count(id) FROM sent_emails se WHERE se.opens <> 0) AS opens, 
                    (SELECT count(id) FROM sent_emails se WHERE se.clicks <> 0) AS clicks'
        );

        $statistics = $statistics_array[0];
        $statistic_emails = ($statistics->emails != 0) ? $statistics->emails : 1;

        $sent_open_bar_chart = DB::select('SELECT t1.period, t1.emails, t2.opens FROM
                    (SELECT DATE_FORMAT(created_at, "%b %Y") as period, COUNT(id) as emails FROM sent_emails se
                    GROUP BY period ORDER BY created_at LIMIT 6) t1
                    LEFT JOIN 
                    (SELECT DATE_FORMAT(created_at, "%b %Y") as period, COUNT(id) as opens FROM sent_emails
                    WHERE opens <> 0 GROUP BY period ORDER BY created_at LIMIT 6) t2 ON (t1.period = t2.period)');


        $open_click_line_chart = DB::select('SELECT t1.period, IFNULL(t1.opens, 0) AS opens, IFNULL(t2.clicks, 0) AS clicks FROM
                    (SELECT DATE(created_at) as period, COUNT(id) as opens FROM sent_emails se
                    WHERE opens <> 0 GROUP BY period ORDER BY created_at DESC LIMIT 12) t1
                    LEFT JOIN 
                    (SELECT DATE(created_at) as period, COUNT(id) as clicks FROM sent_emails
                    WHERE clicks <> 0 GROUP BY period ORDER BY created_at DESC LIMIT 12) t2 ON (t1.period = t2.period)');

        //dd($open_click_line_chart);
        //dd(array_reverse($open_click_line_chart));

        $data = array(
            'campaigns' => $statistics->campaigns,
            'emails' => $statistics->emails,
            'opens' => $statistics->opens,
            'open_rate' => round($statistics->opens / $statistic_emails  * 100, 2),
            'clicks' => $statistics->clicks,
            'ctr' => round($statistics->clicks / $statistic_emails * 100, 2),
            'sent_open_bar_chart' => json_encode($sent_open_bar_chart),
            'open_click_line_chart' => json_encode(array_reverse($open_click_line_chart)),
        );

        return view('dashboard.dashboard', $data);
    }
}
