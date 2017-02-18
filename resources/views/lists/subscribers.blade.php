@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center">{{ trans('subList.h1') }}</h1>
                <hr>
                @if(Session::has('message'))
                    <p style="color: green" class="text-center"><b>{{Session::get('message')}}</b></p>
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
                                        <input type="hidden" name="list_id" value="1">
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
