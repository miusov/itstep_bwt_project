<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Mail\Test as TestMail;
use itstep\User as UserModel;
use itstep\Models\ListModel;
use itstep\Jobs\sendEmail as sendEmailJob;

class SendController extends Controller
{
    public function form()
    {
        $lists = UserModel::find(\Auth::user()->id)->lists()->get();
    	return view('send.form', ['lists' => $lists]);
    }

    public function send(Request $request)
    {
        dispatch(new sendEmailJob(
            $request->get('list_id'),
            $request->get('message'),
            $request->get('subject'),
            \Auth::user()->id
            ));
        return redirect()->back()->with(['flash_message' => trans('messages.send')]);

    }
}
