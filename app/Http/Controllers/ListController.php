<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\ListModel;
//use itstep\Http\Requests\Lists\Create as CreateRequest;
use itstep\User as UserModel;
use itstep\Models\Subscriber as SubscriberModel;
use itstep\Models\List_SubModel;


class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = UserModel::find(\Auth::user()->id)->lists()->paginate(15);
        return view('lists.index',['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create', ['list' => new ListModel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
       $list = ListModel::create([
            'user_id' => \Auth::user()->id,
            'name' => $request->get('name')
            ]);
        return redirect('/lists')->with(['flash_message' => trans('messages.creatcat',array('name' => $list->name))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = ListModel::findOrFail($id);
//        $subscribers = SubscriberModel::find(\Auth::user()->id);
        $list_subscribers = $list->subscribers()->get();

        return view('lists.show',['list'=>$list,'list_subscribers'=>$list_subscribers,'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = ListModel::findOrFail($id);
        return view('lists.create', ['list' => $list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $id)
    {
        $list = ListModel::findOrFail($id);
        $list->fill($request->only([
            'name'
            ]));
        $list->save();
        return redirect('/lists')->with(['flash_message' => trans('messages.updcat',array('name' => $list->name))]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListModel $list)
    {
        $list->delete();
        return redirect()->back()->with(['flash_message' => trans('messages.delcat',array('name' => $list->name))]);
    }

    public function delsubscriber(Request $request)
    {
        $list=ListModel::findOrFail($request->list_id);
        $list->subscribers()->detach($request->subscriber_id);
        return redirect()->back();
    }

//    public function addsubscriber(Request $request)
//    {
//        $subscriber=SubscriberModel::findOrFail($request->subscriber_id);
//        $list=ListModel::findOrFail($request->list_id);
//        if (null ==($list->subscribers()->find($request->subscriber_id)))
//            $list->subscribers()->attach($request->subscriber_id);
//        return redirect()->back();
//    }

    public function showlist()
    {
        $subscribers = SubscriberModel::orderBy('created_at', 'desc')->where('user_id', '=', \Auth::user()->id)->paginate(15);
        return view('lists.subscribers',['subscribers' => $subscribers]);
    }
    
    
    public function add(Request $request)
    {
        List_SubModel::create([
            'list_id' => $request->list_id,
            'subscriber_id' => $request->subscriber_id
        ]);
        return redirect()->back();
    
    }
}
