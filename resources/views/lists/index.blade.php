@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="text-center">{{ trans('subCategory.h1') }}</h1>
	<div class="panel panel-default">

		@if ( \Session::has('flash_message') )
		<div class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{\Session::get('flash_message')}}
		</div>
		@endif

		<div class="panel-heading">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-success" href="{{url('/lists/create')}}">{{ trans('subCategory.addnew') }}</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped task-table tablesorter" id="myTable">

				<!-- Table Headings -->
				<thead>
					<th>№</th>
					<th>{{ trans('subCategory.name') }}</th>
					<th>{{ trans('subList.dateadd') }}</th>
					<th>{{ trans('subCategory.option') }}</th>
				</thead>

				<!-- Table Body -->
				<tbody>
					<?php $i=1; ?>
					@foreach ($lists as $list)
					<tr>
						<td>{{$i++}}</td>
						<td>{{ $list->name }}</td>
						<td>{{ $list->created_at }}</td>
						<td>
							<form action="{{url('/lists',[$list->id])}}" method="post"  style="display: inline;>
								{{csrf_field()}}
								{{method_field('get')}}
								<button class="btn btn-info">
									{{ trans('subList.show') }}
								</button>
							</form>
							<form action="{{ url('/lists', [$list->id, 'edit']) }}" method="POST" style="display: inline;">
								{{ csrf_field() }}
								{{ method_field('GET') }}

								<button class="btn btn-success">{{ trans('subCategory.upd') }}</button>
							</form>
							<form action="{{ url('/lists', $list->id) }}" method="POST" style="display: inline;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger">{{ trans('subCategory.del') }}</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $lists->links() }}
			</div>
		</div>
	</div>
</div>

@endsection