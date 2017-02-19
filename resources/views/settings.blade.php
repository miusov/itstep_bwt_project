@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">{{trans('send.settings')}}</div>

            @if ( \Session::has('flash_message') )
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{\Session::get('flash_message')}}
                </div>
            @endif

            <div class="panel-body row">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/setsettings') }}">
                    {{csrf_field()}}
                    <div class="col-md-3 col-md-push-4">
                        <div class="input-group">
                            <label for="type"  class="input-group-addon">{{trans('send.type')}}</label>
                            <select name="type" id="type" class="form-control">
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2  col-md-push-4">
                        <button class="btn btn-default">OK</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
