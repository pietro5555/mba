@extends('layouts.dashboardnew')

@push('script')
    <script>
		$(document).ready( function () {
            var v = document.getElementById("player");
            var duration = (v.duration/60);

            var link = $("#player").attr('data-route');
            var route = link+"/"+duration;
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(ans){
                    //alert("Listo");
	            }
	        });
        });
    </script>
@endpush

@section('content')
    <div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
				<strong>{{ Session::get('msj-exitoso') }}</strong>
			</div>
		@endif

		<div class="box">
			<div class="box-body">
                <video class="d-block" src="{{ $leccion->url }}" controls crossorigin playsinline poster="{{ asset('uploads/images/courses/covers/'.$leccion->course->cover) }}" id="player" style="width:100%" data-route="{{ route('admin.courses.lessons.load-video-duration', $leccion->id) }}"></video>
			</div>
		</div>
	</div>
@endsection