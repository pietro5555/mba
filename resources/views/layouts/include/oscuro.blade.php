@push('style')
<style>
 
  @if(Auth::user())
    
    
    .modo-oscuro{
        @if(Auth::user()->modo_oscuro == '0') color: #fff; @endif
    }
    
   
    @endif
</style>
@endpush