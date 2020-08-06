@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        <h3>Paypal</h3>
      </div>
    </div>
    
    <div class="box-body">
        <div class="col-md-8 col-md-offset-2">
        {!!$settings->htmlpaypal!!}
        </div>
    </div> 
  </div> 
</div> 

@endsection

@push('script')

@if($settings->scriptpaypal != null)
 {!!$settings->scriptpaypal!!}
@endif
@endpush