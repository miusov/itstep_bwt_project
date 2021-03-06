
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('subList.title') }} <b>{{$subscriber->first_name}} {{$subscriber->last_name}} / {{$subscriber->email}}</b></div>
                    <div class="panel-body">

                        {!! Form::model($subscriber, ['class' => 'form-horizontal','method' => 'PATCH','route' => ['subscribers.update', $subscriber->id]]) !!}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">{{ trans('subList.nfname') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $subscriber->first_name }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
								   <strong>{{ $errors->first('first_name') }}</strong>
							   </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">{{ trans('subList.nlname') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $subscriber->last_name }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
								   <strong>{{ $errors->first('last_name') }}</strong>
							   </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">{{ trans('subList.nemail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required value="{{ $subscriber->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
								   <strong>{{ $errors->first('email') }}</strong>
							   </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('subList.update') }}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection