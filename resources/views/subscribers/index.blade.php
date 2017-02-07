@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ trans('subList.h1') }}</h1>
            <hr>
            @if ( \Session::has('flash_message') )
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{\Session::get('flash_message')}}
            </div>
            @endif
            <div class="col-md-12">
                <table class="table table-striped tablesorter" id="myTable">
                    <thead>
                    <th>№</th>
                    <th>{{ trans('subList.fname') }}</th>
                    <th>{{ trans('subList.lname') }}</th>
                    <th>{{ trans('subList.email') }}</th>
                    <th>{{ trans('subList.dateadd') }}</th>
                    <th>{{ trans('subList.upddate') }}</th>
                    <th>{{ trans('subList.option') }}</th>
                    </thead>
                    <tbody>
                     <?php $i=1; ?>
                     @foreach($subscribers as $subscriber)
                     <tr><td>{{$i++}}</td><td>{{$subscriber->first_name}}</td><td>{{$subscriber->last_name}}</td><td>{{$subscriber->email}}</td><td>{{$subscriber->created_at}}</td><td>{{$subscriber->updated_at}}</td><td>
                        <a class="btn btn-primary" href="{{ route('subscribers.edit',$subscriber->id) }}">{{ trans('subList.edit') }}</a>  {!! Form::open(['method' => 'DELETE','route' => ['subscribers.destroy', $subscriber->id],'style'=>'display:inline']) !!}
                        {!! Form::submit( trans('subList.del'), ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
