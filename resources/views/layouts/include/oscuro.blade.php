@push('style')
<style>
 
  @if(Auth::user())
    .content-wrapper{
        @if(Auth::user()->modo_oscuro == '1') background-color: #111;
        @elseif(request()->path() == 'admin') background-image: url('{{ asset('assets/inicio.png') }}'); @endif
    }
    
    .modo-oscuro{
        @if(Auth::user()->modo_oscuro == '1') color: #fff; @endif
    }
    
    .content-header>.breadcrumb>li>a{
        @if(Auth::user()->modo_oscuro == '1') color: #fff; @endif
    }
    @endif
</style>
@endpush