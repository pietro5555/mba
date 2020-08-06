@extends('layouts.login.inicio')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
        <button class="btn btn-info" data-toggle="modal" data-target="#noticiaCrear" style="float: right;">Crear Noticia</button>
      <div class="box-title">
        Noticias
      </div>
    </div>
    <div class="box-body">
      
         @foreach($noticias as $noticia)
         <div class="col-sm-12">
             
             {!! $noticia->noticias !!}
             <p style="float: right;">Subido {{$noticia->created_at->diffForHumans()}}</p>
             
             <center>
                 
            
             <a href="{{ route('noticias-delete', $noticia->id) }}" class="btn btn-danger"><span
            class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
            </center>
            
             <br>
             <hr>
             </div>
         @endforeach
    </div>
  </div>
</div>


{{-- modal para crear noticias --}}
<div class="modal fade" id="noticiaCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear Noticias</h4>
            </div>
            <div class="modal-body">
                <form class="" action="{{route('noticias-save')}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Contenido de la noticia</label>
                     <textarea name="contenido" class="summernote" cols="30"
                                    rows="10" required></textarea>
                            </div>
                            </div>
                    
                    <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('contenido');
</script>
@endpush