@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h1>Hello {{ Auth::user()->email }}</h1>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>
    </div>
</div>
@endsection
