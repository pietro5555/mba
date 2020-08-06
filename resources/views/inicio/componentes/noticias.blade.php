{{-- noticias --}}
<!-- Info boxes -->
<div class="row">
  <div class="col-md-12">
     <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Noticias</h3>
        <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      
      
       <div class="box-body">
      
      @foreach($noticias as $noticia)
         <div class="col-sm-12">
             
             {!! $noticia->noticias !!}
             <p style="float: right;">Subido {{$noticia->created_at->diffForHumans()}}</p>
            
             <br>
             <hr>
             </div>
         @endforeach

    </div>
      
    </div>
  </div>
</div>     