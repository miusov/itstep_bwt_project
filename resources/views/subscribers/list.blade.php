@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Subscriber List</h1>
                <hr>
                @if(Session::has('message'))
                    <p style="color: green" class="text-center"><b>{{Session::get('message')}}</b></p>
                @endif
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead><th>First Name</th><th>LastName</th><th>Email</th><th>Options</th></thead>
                        <tbody>
                    @foreach($subscribers as $subscriber)
                            <tr><td>{{$subscriber->first_name}}</td><td>{{$subscriber->last_name}}</td><td>{{$subscriber->email}}</td><td>
                                    <a class="btn btn-primary" href="{{ route('subscribers.edit',$subscriber->id) }}">Edit</a>  {!! Form::open(['method' => 'DELETE','route' => ['subscribers.destroy', $subscriber->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}</td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
