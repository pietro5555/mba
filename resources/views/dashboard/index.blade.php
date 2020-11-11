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
  
</script>
@endpush