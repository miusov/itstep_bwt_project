@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					@if($list->exists === true)
					{{ trans('subCategory.updnewcat') }}
					@else
					{{ trans('subCategory.addnewcat') }}
					@endif
				</div>
				<div class="panel-body">
					@if($list->exists === true)
					<form action="{{ url('/lists', $list->id)}}" class="form-horizontal" role="form" method="POST">
						{{ method_field('PUT') }}
						@else
						<form action="{{ url('/lists')}}" class="form-horizontal" role="form" method="POST">
							{{ method_field('POST') }}
							@endif
							{{csrf_field()}}
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="col-md-4 control-label">{{ trans('subCategory.namecat') }}</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name', $list->name) }}" required autofocus>

									@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										@if($list->exists === true)
										{{ trans('subCategory.upd') }}
										@else
										{{ trans('subCategory.add') }}
										@endif
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