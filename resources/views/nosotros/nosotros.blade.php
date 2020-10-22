@extends('layouts.landing')

@section('content')
<div style="width: 100%; position: relative; display: inline-block;">
    <img src="{{ asset('uploads/images/banner/') }}" alt="" style="height: 500px; width:100%; opacity: 0.5;">
    <div class="bg-danger" style="position: absolute; top: 2%; left: 65%;">
       <div style="color: white; font-size: 70px; font-weight: bold;">
        <h1 style="font-weight: bold; font-size: 65px; color: #2A91FF;">MY BUSSINESS</h1>
          <a style="font-weight: bold; width: 180px; font-size: 65px; color: #2A91FF;">MY BUSSINESS</a><br>
          <div style="width: 60%; line-height: 70px;">
             <a href="" class="text-white"></a>
             HOLAA
          </div>
        <div class="next-streaming-date">
               <i class="fa fa-calendar"></i>
               <i class="fa fa-clock" style="padding-left: 20px;"></i>
           </div>
          <div class="float-right" style="font-size: 35px; padding-top: 60px;">
            HOLA
          </div>
       </div>
    </div>
 </div>
@endsection
