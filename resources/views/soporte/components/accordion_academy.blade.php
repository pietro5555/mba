@if(!$articles->isEmpty())
<div id="accordion">
    @foreach($articles as $article)
        <div class="card accordion-academy">
          <div class="card-header" id="heading-{{$article->id}}">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$article->id}}" aria-expanded="true" aria-controls="collapse-{{$article->id}}">
                    <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right" height="20"> &nbsp; &nbsp;{{$article->title}}
              </button>
            </h5>
          </div>

          <div id="collapse-{{$article->id}}" class="collapse" aria-labelledby="heading-{{$article->id}}" data-parent="#accordion">
            <div class="card-body">
                    {!!$article->description!!}
            </div>
          </div>
        </div>
    @endforeach
</div>
@else
<h3 class="white">No se encontraron Artículos...</h3>
@endif
