<section class="content-header">
    <h1 class="modo-oscuro">
        {{$title}}
        @if ($title == 'Nuevo Registro' && !empty(request()->tipouser))
            Cliente
        @endif
    </h1>
    
</section>