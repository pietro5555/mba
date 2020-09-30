@extends('layouts.dashboardnew')

@push('script')
    <script>
		/*$(document).ready( function () {
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
        });*/
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
				<iframe src="https://player.vimeo.com/video/435854666" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>
		</div>
	</div>
@endsection