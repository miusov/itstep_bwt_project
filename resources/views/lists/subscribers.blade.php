@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center">{{ trans('subList.h1') }}</h1>
                <hr>
                <div class="col-md-12">
                    <a href="{{url('/lists/'.$id)}}" class="btn btn-info">Back</a>
                </div>
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
                        <th>{{ trans('subList.option') }}</th>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$subscriber->first_name}}</td>
                                <td>{{$subscriber->last_name}}</td>
                                <td>{{$subscriber->email}}</td>
                                <td>
                                    <form action="{{url('/list/add')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="subscriber_id" value="{{$subscriber->id}}">
                                        <input type="hidden" name="list_id" value="{{$id}}">
                                        <input type="hidden" name="name" value="{{$subscriber->first_name}}">
                                        <button class="btn btn-success">{{trans('subscribers.add')}}</button>
                                    </form>                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <?php echo $subscribers->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
