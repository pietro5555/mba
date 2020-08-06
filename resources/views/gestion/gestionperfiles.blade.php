@extends('layouts.dashboardnew')

@section('content')
<div class="wrapper-md" style="padding: 15px;">
<div class="col-md-12 buq" >
    @if (Session::has('msj2'))
                          <div class="alert alert-danger">
                              <button class="close" data-close="alert"></button>
                              <span>
                                 {{Session::get('msj2')}}
                              </span>
                          </div>
                      @endif
    <form method="POST" action="{{ route('gestion.gestion') }}">
            {{ csrf_field() }}
            
             <div class="col-sm-4">
                
               <label class="control-label " style="text-align: center; margin-top:4px;">Nombre Usuario</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="user_nicename" required style="background-color:f7f7f7;"/>
           
            </div>
            
              <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn" style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
               </div>
            
            </form>
    </div>
     </div>
     
@endsection


