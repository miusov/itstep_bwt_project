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
					<a class="btn btn-default" href="{{url('/lists/create')}}">{{ trans('subCategory.addnew') }}</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped task-table">

				<!-- Table Headings -->
				<thead>
					<th>{{ trans('subCategory.name') }}</th>
					<th>{{ trans('subCategory.option') }}</th>
				</thead>

				<!-- Table Body -->
				<tbody>
					@foreach ($lists as $list)
					<tr>
						<td class="table-text">
							<div>{{ $list->name }}</div>
						</td>
						<td>
							<form action="{{ url('/lists', $list->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger">{{ trans('subCategory.del') }}</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

@endsection