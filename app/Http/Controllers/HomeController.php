<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber;
use itstep\User;

class HomeController extends Controller
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
        return view('home');
    }

    public function model (){
        // Subscriber::create([   //добавление записи в БД
        //     'user_id'=>\Auth::user()->id,
        //     'first_name'=>'John',
        //     'last_name'=>'Doe',
        //     'email'=>'john_doe@mail.com'
        //     ]);

        // или
        // $subscriber = new Subscriber();

        // $subscriber->user_id = \Auth::user()->id;
        // $subscriber->first_name = 'First_name John';
        // $subscriber->last_name = 'Last_name Doe';
        // $subscriber->email = 'john_doe@mail.com';
        // $subscriber->save();

        // $subscriberId = 2;
        // $subscriber = Subscriber::find($subscriberId); //поиск по id и замена записи в БД
        // $subscriber->email = 'john_doe+1@mail.com';
        // $subscriber->save();

        // $subscriberId = 5;
        // $subscriber = Subscriber::findOrFail($subscriberId);  //???????

        // echo '<pre>'.print_r(Subscriber::where('first_name', 'John')->get()->toARRAY(), true).'</pre>';

        // echo Subscriber::where('first_name', 'John')->toSql();

        // Subscriber::find(2)->delete();  //удаляет запись

        echo '<pre>'.print_r(User::find(1)->subscribers()->get()->toArray(),true).'</pre>';
    }
}
