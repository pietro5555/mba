@if(Auth::user()->rol_id==3)
                                @if(!empty($resources_survey))
                                    @if ($surveysCount > $surveysUser)
                                        <div>
                                            <h5 class="text-primary">Responde estas preguntas</h5>
                                        </div>
                                        
                                        <form id="survey_response_form">
                                            @csrf
                                            <div class="mb-2 form-group">
                                                @foreach($resources_survey  as $encuesta)
                                                    @if (is_null($encuesta->user_response))
                                                        <input type="hidden" name="row[]" value="{{$loop->index}}">
                                                        <label class="mt-2" for="label-question{{$encuesta->pregunta->question}}">{{$encuesta->pregunta->question}}</label>
                                                        <select class="browser-default custom-select" name="response[]" id="response" required>
                                                            <option value="" selected disabled>Selecciona una respuesta</option>
                                                            @foreach($encuesta->pregunta->responses->where('selected', 0)  as $respuesta)
                                                                <option value="{{$respuesta->response}}">{{$respuesta->response}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="survey_options_id[]" value='{{$encuesta->pregunta->id}}' required>
                                                    @endif
                                                @endforeach
                                                
                                               
                                                
                                                <input type="hidden" name="event_id" value='{{$event_id}}' required>
                                                <input type="hidden" name="user_id" value='{{Auth::user()->ID}}' required>
                                                <input type="hidden" name="selected" value='1' required>
                                            </div>
                                            <a class="btn btn-small btn-success float-right" onclick="newResponseSurvey();" id="survey_response_submit">Enviar</a>
                                            <button class="btn btn-success" type="button" disabled id="survey_response_loader" style="display: none;">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Espere...
                                            </button>
                                        </form>
                                    @else
                                        <div>
                                            <h5 class="text-primary">No hay encuestas disponibles</h5>
                                        </div>
                                    @endif
                                @else
                                    <div>
                                        <h6 class="text-primary">
                                            No hay encuestas asignadas.
                                        </h6>
                                    </div>
                                @endif
                            @endif
                            @if(Auth::user()->rol_id==2)
                                @if(!empty($resources_survey))
                                    <div id="charts-slider" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @php $cont = 0; @endphp
                                            @foreach($resources_survey  as $encuesta)
                                                @php $cont++; @endphp
                                                <div class="carousel-item @if ($cont == 1) active @endif">
                                                    <div>
                                                        <h4 class="text-white">{{ $encuesta->pregunta->question }}</h4>
                                                    </div>
                                                    <div>
                                                        <canvas id="survey-chart-{{$encuesta->id}}" width="400" height="400"></canvas>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#charts-slider" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#charts-slider" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                @endif
                            @endif