<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::orderBy('created_at')
            ->select('id', 'name', 'description', 'image_url')
            ->get();

        $data = array(
            'templates' => $templates,
        );

        return view('dashboard.templates', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $template = Template::find($id);

        if (!$template) {
            return abort(404);
        }

        return response($template->content);
    }
}
