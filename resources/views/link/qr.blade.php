@extends('layouts.dashboardnew')


@section('content')

@guest
<div class="col-sm-8 col-sm-offset-2">
    @else
    <div class="col-xs-12">
    @endguest
<div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                Codigo QR 
            </div>
        </div>
        <div class="box-body">
            @guest
            <div class="col-sm-12">
                @else
                 <div class="col-xs-12 col-sm-12 col-md-12">
                @endguest
            
            @php
            $cont = 1;
            @endphp
            
              
              {!! (!empty($qr->contenido)) ? $qr->contenido : '' !!}
              
           
           
          </div>
        </div>
      </div>
    </div>
</div>
</div>

@endsection