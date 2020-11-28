@if(!$tickets->isEmpty())
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
@else
<h3 class="white">No se encontraron Preguntas...</h3>
@endif
