@extends('layouts.dashboardnew')

@push('script')
@endpush

@section('content')


<div class="col-xs-12">
<h2 class="white font-weight-bold">Preguntas más frecuentes</h2><hr>
<div style="float:right;">
     @if(Auth::user()->rol_id == 0)
    <a href="{{route('soporte.tickets.team')}}" class="btn btn-info"><i class="fas fa-ticket-alt"></i> Tickets/Soporte</a>
    <a href="{{route('soporte')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Inicio</a>
    @endif
    @if(Auth::user()->rol_id != 0)
    <a href="{{route('soporte.tickets')}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Crear ticket</a>
    <a href="{{route('soporte')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Inicio</a>
    @endif
</div><br><br><br>
@if(!$tickets->isEmpty())
<div>
	<div id="accordion">
    @foreach($tickets as $ticket)
    @if(!is_null($ticket->support))
        <div class="card accordion-academy">
          <div class="card-header" id="heading-{{$ticket->id}}">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$ticket->id}}" aria-expanded="true" aria-controls="collapse-{{$ticket->id}}">
                    <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right" height="20"> &nbsp; &nbsp;{{$ticket->titulo}}
              </button>
            </h5>
          </div>

          <div id="collapse-{{$ticket->id}}" class="collapse" aria-labelledby="heading-{{$ticket->id}}" data-parent="#accordion">
            <div class="card-body">
                    {!!$ticket->support->response!!}
            </div>
          </div>
        </div>
      @endif
    @endforeach
</div>
</div>
@else
<h3 class="white">No se encontraron Preguntas asociadas...</h3>
@endif


</div>

@endsection
