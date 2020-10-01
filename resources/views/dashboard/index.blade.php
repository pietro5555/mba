@extends('layouts.dashboardnew')

@section('content')
  <!-- Main content -->
  <section class="content">
      
    {{-- seccion de slider --}}
    @include('dashboard.componenteIndex.slider')
    
    {{-- seccion de los cuadros informativos --}}
    @include('dashboard.componenteIndex.cuadros')
    {{-- seccion de las graficas --}}
    @include('dashboard.componenteIndex.graficas')

    {{-- seccion de rangos y ultimos productos --}}
    @include('dashboard.componenteIndex.productosyrangos')
    
    {{-- seccion de nuevos miembros y de ultimos pedidos --}}
    {{--@include('dashboard.componenteIndex.pedidosymiembros')--}}

    
    {{-- seccion de noticias y materiales --}}
    {{--@include('dashboard.componenteIndex.herramientas')--}}
    
    @if($pop->activado == '1')
     <div class="modal fade" id="mostrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{!! (!empty($pop->titulo)) ? $pop->titulo : '' !!}   </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
       {!! (!empty($pop->contenido)) ? $pop->contenido : '' !!}   
               
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 
@endif

  </section>
  <!-- /.content -->
@endsection

@push('script')
<script type="text/javascript">
  function copyToClipboard(element) {
    var aux = document.createElement("input");
    let link = document.getElementById(element).innerHTML.replace('&amp;', '&')
    aux.setAttribute("value", link);
    document.body.appendChild(aux);
    aux.select();
    
    document.execCommand("copy");
    document.body.removeChild(aux);
    swal.fire({
      type:'success',
      title:'Link copiado con exito'
    })
  }
  
  
  if({{Auth::user()->pop_up }} == 1){
      $('#mostrar').modal();
  }
</script>
@endpush