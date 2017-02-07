<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber as SubscriberModel;
use itstep\Models\Subscriber;
use DB;
use Auth;

class SubscriberController extends Controller
{

    public function index()
    {
      return view('subscribers.index',['subscribers' => SubscriberModel::all()]);
    }


    public function create()
    {
        return view('subscribers.create');
    }


    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        
        SubscriberModel::create([
            'user_id' => \Auth::user()->id,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email')
            ]);
        return redirect()->route('subscribers.index')->with('flash_message',  trans('messages.creatsub'));
    }


    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'first_name' => 'required|max:128|min:2',
            'last_name' => 'required|max:128|min:2',
            'email' => 'required|email|max:256',
            ]);
    }


    public function show($id)
    {
        $subscriber = Subscriber::find($id);
        return view('subscribers.show',compact('subscriber'));
    }


    public function edit($id)
    {
        $subscriber = Subscriber::find($id);
        return view('subscribers.edit',compact('subscriber'));
    }


    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        Subscriber::find($id)->update($request->all());
        return redirect()->route('subscribers.index')->with('flash_message', trans('messages.updsub'));
    }


    public function destroy($id)
    {
        Subscriber::find($id)->delete();
        return redirect()->route('subscribers.index')->with('flash_message',trans('messages.delsub'));
    }
}
