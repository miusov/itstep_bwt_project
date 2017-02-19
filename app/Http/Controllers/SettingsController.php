<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\SettingsModel;

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
        return view('settings');
    }

    public function setsettings(Request $request){
//        echo "Set: ".$request->type;
//        return redirect()->back();

        $type = SettingsModel::create([
            'type' => $request->type
        ]);


        return redirect()->back()->with(['flash_message' => trans('messages.service',array('type' => $type->type))]);
    

    }
}
