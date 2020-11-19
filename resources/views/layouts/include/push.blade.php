@guest
@else
@php
$pushs =DB::table('pushs')
->where('iduser', Auth::user()->ID)
->where('status', '0')
->get(); 

foreach($pushs as $push){
DB::table('pushs')
->where('id', '=', $push->id)
->update([
'status' => 1,
  ]);
}
@endphp
@endguest

@if(!empty($pushs))
<script type="text/javascript">
    @foreach($pushs as $push)
    Push.create("{{$push->titulo}}",{
    body:"{{$push->body}}",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
    @endforeach
</script>
@endif

@if(session('tipo') == 'success')
<script type="text/javascript">
    Push.create("Completado",{
    body:"{{session('msj')}}",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
</script>
@endif

@if ($errors->any())
<script type="text/javascript">
    Push.create("Error",{
    body:"@foreach($errors->all() as $error) {{$error}} @endforeach",
    icon:"{{ asset('images/logo.png') }}",
    timeout: 4000,
    onClick: function(){
    this.close(); 
     }
    });
</script>

@endif