@extends('layouts.dashboardnew')

@section('content')


@foreach ($comentario as $comen)
   
<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
           
 <div class="col-sm-2">
     
     @php
     $buscar = DB::table($settings->prefijo_wp.'users')
                            ->where('ID', '=', $comen->user_id)
                            ->get(); 
     @endphp
     
     @foreach ($buscar as $bus)
     <img src="/mioficina/avatar/{{$bus->avatar}}" alt="" class="circular-tick">
          </div>
  @endforeach
  
  <div class="media-body">
    <h5 class="mt-0"><strong>{{$bus->display_name}}</strong></h5>
    <p>{!! $comen->comentario !!}</p>
    @if($comen->archivo != null)
    <p><a href="/mioficina/ticket/{{$comen->archivo}}" download="{{$comen->archivo}}" class="btn btn-info"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a></p>
    @endif
    <p style="float:right;">{{date('d-m-Y', strtotime($comen->created_at))}}</p>
  </div>

    </div>
  </div>
</div>

      @endforeach
   
   
   
   
      @php
     $falta = DB::table($settings->prefijo_wp.'users')
                            ->where('ID', '=', $ticket->user_id)
                            ->get(); 
     @endphp
      
     <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-body">
           
 <div class="col-sm-2">
     @foreach($falta as $fal)     
      <img src="/mioficina/avatar/{{$fal->avatar}}" alt="" class="circular-tick">
          </div>
     
     <div class="media-body">

    <h5 class="mt-0"><strong>{{$fal->display_name}}</strong></h5>
    @endforeach
    <p>{!! $ticket->comentario !!}</p>
    @if($ticket->archivo != null)
    <p><a href="/mioficina/ticket/{{$ticket->archivo}}" download="{{$ticket->archivo}}" class="btn btn-info"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a></p>
    @endif
    <p style="float:right;">{{date('d-m-Y', strtotime($ticket->created_at))}}</p>
  </div>

   </div>
 </div>
</div>

@endsection
