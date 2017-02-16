<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\ListModel;
// use itstep\Http\Request\Lists\Create as CreateRequest;
use itstep\Http\Requests\Lists\Create as CreateRequest;
use itstep\User as UserModel;


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
        // реализовать просмотр списка подписчиков
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
}
