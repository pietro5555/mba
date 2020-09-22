<div class="row">
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="info-box border-radius" style="border-radius: 20px;">
      <div class="box-body" style="padding: 15px 20px;">
        <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px;">Últimos Miembros</h3>
          @foreach ($new_member as $member)
          <div class="col-sm-6 col-xs-12" style="margin-bottom: 20px;">
            <div class="col-md-5 col-xs-5" align="left">
              <img src="{{asset('assets/img/member.jpg')}}" alt="" style="border-radius: 60%; width: 80px; height: 80px;">
            </div>
              <div class="col-md-7 col-xs-7">
                <div class="card-body"> 
                  <h6 class="card-title white">{{$member->display_name}}</h6>
                  <h4 class="card-title white">{{date('d-m-Y', strtotime($member->created_at))}}</h4>
                </div>
              </div>
           </div> 
          @endforeach
      </div>
    </div>
  </div>


  <div class="col-md-6">
    <div class="info-box border-radius" style="border-radius: 20px;">
      <div class="box-body" style="padding: 15px 20px;">
        <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;">Rangos</h3>

        @foreach($rangos as $rango)
        <div class="">
          <span class="pull-right text-primary white">{{$rango->cantidad}} / {{$cantAllUsers}}</span>
          <span class="white">{{$rango->name}}</span>
        </div>
             @if($rango->cantidad > 0)
             <div class="progress progress-xs m-t-sm bg-white">
              <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="{{ (($rango->cantidad * 100) / $cantAllUsers) }}%" style="width: {{ (($rango->cantidad * 100) / $cantAllUsers) }}%"></div>
            </div>
              @else
            <div class="progress progress-xs m-t-sm bg-white">
                <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="0%" style="width: 0%">
                </div>
            </div>
            @endif
         @endforeach
       </div>
     </div>
   </div> 

</div>