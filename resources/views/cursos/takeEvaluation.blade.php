@extends('layouts.landing')

@section('content')
    <div style="padding: 15px 25px;">
        <div class="accordion border_circle">
            <div class="bs-example">
                <form action="{{ route('client.courses.submit-evaluation') }}" method="POST">
                    @csrf
                    <input type="hidden" name="evaluation_id" value="{{ $evaluacion->id }}">
                    <input type="hidden" name="questions_quantity" value="{{ $evaluacion->questions_count }}">
                    <div class="panel-group" id="accordion">
                        @php $cont = 0; @endphp
                        @foreach ($evaluacion->questions as $pregunta)
                            @php $cont++; @endphp
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$pregunta->id}}">
                                    <div class="col-md-12 p-2 accordion-seccion-leccion align-items-center">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="cuadrado"><h2 class="text-white"> {{ $pregunta->order }}</h2></div>
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <p class="panel-title"> <h5 class="text-white"> {{ $pregunta->question }}</h5></p>
                                            </div>
                                            <div class="col-md-2">
                                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse-{{$pregunta->id}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 m-2 pl-4 pr-4" style="font-size: 20px; color: white;">
                                                <div class="form-check">
                                                    <input type="hidden" name="question-{{$pregunta->order}}" value="{{ $pregunta->id }}">
                                                    <input type="hidden" name="answer-{{$pregunta->order}}" value="{{ $pregunta->correct_answer }}">
                                                    <input class="form-check-input" type="radio" name="selection-{{$pregunta->order}}" id="selection-{{$pregunta->order}}-1" value="1">
                                                    <label class="form-check-label" for="selection-{{$pregunta->order}}-1">
                                                    {{ $pregunta->answer_1 }}
                                                    </label>
                                                </div>
                                                @if (!is_null($pregunta->answer_2))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="selection-{{$pregunta->order}}" id="selection-{{$pregunta->order}}-2" value="2">
                                                        <label class="form-check-label" for="selection-{{$pregunta->order}}-2">
                                                        {{ $pregunta->answer_2 }}
                                                        </label>
                                                    </div>
                                                @endif
                                                @if (!is_null($pregunta->answer_3))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="selection-{{$pregunta->order}}" id="selection-{{$pregunta->order}}-3" value="3">
                                                        <label class="form-check-label" for="selection-{{$pregunta->order}}-3">
                                                        {{ $pregunta->answer_3 }}
                                                        </label>
                                                    </div>
                                                @endif
                                                @if (!is_null($pregunta->answer_4))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="selection-{{$pregunta->order}}" id="selection-{{$pregunta->order}}-4" value="4">
                                                        <label class="form-check-label" for="selection-{{$pregunta->order}}-4">
                                                        {{ $pregunta->answer_4 }}
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <button class="btn btn-info btn-lg btn-block">Finalizar Evaluaci贸n</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection