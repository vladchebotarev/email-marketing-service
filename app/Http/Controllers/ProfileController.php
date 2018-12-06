<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        return view('dashboard.profile');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->withErrors(['current_password' => __('passwords.passwords_not_matches')]);
        }
        if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->withErrors(['password' => __('passwords.new_password_same')]);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));

        DB::beginTransaction();
        try {
            $user->save();
            DB::commit();
            return redirect()->back()->with("status", __('passwords.changed'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['db_error' => __('messages.db_error')]);
        }
    }
}
