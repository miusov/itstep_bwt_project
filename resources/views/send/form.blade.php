@extends('layouts.app')

@section('content')

<div class="container">
 <div class="row">
   @if ( \Session::has('flash_message') )
     <div class="alert alert-success alert-dismissable">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{\Session::get('flash_message')}}
     </div>
   @endif
   <div class="col-md-8 col-md-offset-2">
     <div class="panel panel-default">
       <div class="panel-heading">{{ trans('send.smess') }}</div>
       <div class="panel-body">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/send-email') }}">
           {{csrf_field()}}
           <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
             <label for="to" class="col-md-4 control-label">{{ trans('send.to') }}</label>

             <div class="col-md-6">
               <select name="list_id" class="form-control">
                 @foreach($lists as $list)
                  <option value="{{ $list->id }}">{{ $list->name }}</option>
                 @endforeach 
               </select>

               @if ($errors->has('to'))
               <span class="help-block">
                 <strong>{{ $errors->first('to') }}</strong>
               </span>
               @endif
             </div>
           </div>
           <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
             <label for="subject" class="col-md-4 control-label">{{ trans('send.subj') }}</label>

             <div class="col-md-6">
               <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

               @if ($errors->has('subject'))
               <span class="help-block">
                 <strong>{{ $errors->first('subject') }}</strong>
               </span>
               @endif
             </div>
           </div>
           <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
             <label for="message" class="col-md-4 control-label">{{ trans('send.mess') }}</label>

             <div class="col-md-6">
               <textarea id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" required autofocus ></textarea>

               @if ($errors->has('message'))
               <span class="help-block">
                 <strong>{{ $errors->first('message') }}</strong>
               </span>
               @endif
             </div>
           </div>
           <div class="form-group">
             <div class="col-md-8 col-md-offset-4">
               <button type="submit" class="btn btn-primary">
                 {{ trans('send.send') }}
               </button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
