<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\SettingsModel as Setting;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=\DB::table('email_send_types')->get();
        return view('settings',['types'=>$types]);
    }

    public function setsettings(Request $request){

        $user = Setting::where('user_id',\Auth::id())->first();
        if (!$user)
        {
            $setting = new Setting;
            $setting -> type_send_id = $request->type;
            $setting -> user_id=\Auth::id();
            $setting -> save();
        }
        else
        {
            $setting = $user;
            $setting -> type_send_id = $request->type;
            $setting -> save();
        }
        return redirect()->back()->with(['flash_message' => trans('messages.service')]);
    

    }
}
