<h4 class="title-note pb-2">Notas Guardadas</h4>
                            @foreach ($notes as $note)
                                <div class="accordion accordionNotes mb-2" id="accordionNote{{$note->id}}">
                                    <div class="card">
                                        <div class="card-header" id="heading{{$note->id}}">
                                            <p class="mb-2 mt-2" data-toggle="collapse" data-target="#collapse{{$note->id}}"
                                                aria-expanded="true" aria-controls="collapse{{$note->id}}">
                                                {{$note->title}}
                                                <img src="https://mybusinessacademypro.com/academia/images/icons/chevron-black.svg" height="20px"
                                                    width="20px" class="float-right">
                                            </p>
                                        </div>
    
                                        <div id="collapse{{$note->id}}" class="collapse"
                                            aria-labelledby="heading{{$note->id}}"
                                            data-parent="#accordionNote{{$note->id}}">
                                            <div class="card-body  mb-2">
                                                {{$note->content}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach