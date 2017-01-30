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
                    <table class="table table-striped tablesorter" id="myTable">
                        <thead><th>№</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Date Added</th><th>Update Date</th><th>Options</th></thead>
                        <tbody>
                       <?php $i=1; ?>
                    @foreach($subscribers as $subscriber)
                            <tr><td>{{$i++}}</td><td>{{$subscriber->first_name}}</td><td>{{$subscriber->last_name}}</td><td>{{$subscriber->email}}</td><td>{{$subscriber->created_at}}</td><td>{{$subscriber->updated_at}}</td><td>
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
