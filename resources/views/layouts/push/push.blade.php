@if (Session::has('msj-exitoso'))
<script type="text/javascript">
    Push.create("Completado",{
    body:"{{ Session::get('msj-exitoso') }}",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
</script>
@endif

@if (Session::has('msj-erroneo'))

<script type="text/javascript">
    Push.create("Error",{
    body:"{{ Session::get('msj-erroneo') }}",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
</script>

@endif


@if (Session::has('msj3'))

<script type="text/javascript">
    Push.create("Error",{
    body:"{{ Session::get('msj3') }}",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
</script>

@endif