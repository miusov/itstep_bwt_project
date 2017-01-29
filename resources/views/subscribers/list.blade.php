@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Subscriber List</h1>
                <div class="col-md-12">
                    @foreach($subscribers as $subscriber)
                        <p>{{$subscriber->first_name}} {{$subscriber->last_name}} {{$subscriber->email}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
