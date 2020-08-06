<section class="content-header">
    <h1 class="modo-oscuro">
        {{$title}}
        @if ($title == 'Nuevo Registro' && !empty(request()->tipouser))
            Cliente
        @endif
        {{-- <small>Version 3.1</small> --}}
    </h1>
    <ol class="breadcrumb">
    
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="modo-oscuro">{{$title}}</li>
    </ol>
</section>