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

    	// $data = [
    	// 	'text' => $request->get('message')
    	// ];
    	// \Mail::send('emails.test', $data,
    	// 	function ($message) use ($request){
    	// 		$message->to($request->get('to'))->subject($request->get('subject'));
    	// });

        // $listSubscribers = ListModel::findOrFail($request->get('list_id'))->subscribers()->get();
        // foreach ($listSubscribers as $subscriber) {
        //     $mail = new TestMail($request->get('message'), $request->get('subject'));
        //     \Mail::to($subscriber->email)->send($mail);

        // }


     //    $when = \Carbon\Carbon::now()->addMinutes(1);

    	// $mail = new TestMail($request->get('message'), $request->get('subject'));
    	// \Mail::to($request->get('to'))->later($when, $mail);

    }
}
