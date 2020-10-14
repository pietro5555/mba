@extends('layouts.dashboardnew')

@section('content')
    <div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
				<strong>{{ Session::get('msj-exitoso') }}</strong>
			</div>
		@endif

		<div class="box">
			<div class="box-body">
				<iframe src="{{ $leccion->url }}" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>
		</div>

		@if (!is_null($leccion->english_url))
			<div class="box">
				<div class="box-body">
					<iframe src="{{ $leccion->english_url }}" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
				</div>
			</div>
		@endif
	</div>
@endsection