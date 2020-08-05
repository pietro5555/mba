@extends('layouts.dashboardnew')

@section('content')

<style>

 #tree{
 width:{{$width['pc']}}%;
 }

@media only screen and (max-width: 440px) {
    #tree{
    width:{{$width['celular']}}%;
    }
}
</style>

{{-- buscador --}}
<div class="col-xs-12 col-md-12" style="overflow-x: scroll;">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">
					Buscar Usuarios
				</h3>
			</div>
			<div class="box-body">
				<form action="{{route('moretree2')}}" method="post" class="form-inline">
					{{ csrf_field() }}
					<div class="form-group" style="margin-top: 10px; margin-bottom: 30px;">
						<label for="">ID a Buscar</label>
						<input type="number" step="1" name="id" class="form-control" required>
					</div>
					<div class="form-group" style="margin-top: 10px; margin-bottom: 30px;">
						<button type="submit" class="btn btn-info">Buscar</button>
					</div>
				</form>
			</div>
		</div>
	

	<div id="tree" style="margin-left:50px; margin-top:90px;" scroll="auto">
		<ul>
			<li>
				<!-- NODO PRINCIPAL -->
				<a onclick="" href="#">
					<img title="{{ ucwords($referidoBase['nombre']) }}" src="{{ asset('/arbol/'.$referidoBase['picture'])}}"
					 style="width:35px">
					<div class="inforuser">
						<h3><img title="{{ ucwords($referidoBase['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $referidoBase['avatar'] }}"></h3>
						<h4>{{ ucwords($referidoBase['nombre']) }}</h4>
						<h5><span>Ingreso</span>: <b>{{ date('d-m-Y', strtotime($referidoBase['fechaingreso'])) }}</b></h5>
						
						<h5>ID: {{ $referidoBase['ID'] }}</b></h5>
						
						 @if (!empty($settingPuntos))
                        <h5>Personales: {{ $referidoBase['personales'] }}</b></h5>
                        <h5>Red: {{ $referidoBase['red'] }}</b></h5>
                        @endif
						<h5><b class="rol">{{ $referidoBase['rol'] }}</b></h5>
					</div>
					{{-- <h5 class="nombre">{{ ucwords($referidoBase['nombre']) }}</h5> --}}
				</a>
				{{-- nivel 1 --}}
				<ul>
					@foreach ($referidosAll as $item)
					@if ($item['subreferido'] == 0)
						@if($item['idpatrocinador'] == $referidoBase['ID'] && $item['nivel'] == 1)
						<li>  
							<a href="{{ route('moretree', $item['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif">
								<img title="{{ ucwords($item['nombre']) }}" src="{{ asset('/arbol/'.$item['picture'])}}" style="width:35px">
								<div class="inforuser">
									<h3><img title="{{ ucwords($item['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $item['avatar'] }}"></h3>
									<h4>{{ ucwords($item['nombre']) }}</h4>
									<h5><span>Ingreso</span>: <b>{{ date('d-m-Y', strtotime($item['fechaingreso'])) }}</b></h5>
									<h5>ID: {{ $item['ID'] }}</b></h5>
									@if (!empty($settingPuntos))
                        <h5>Personales: {{ $item['personales'] }}</b></h5>
                        <h5>Red: {{ $item['red'] }}</b></h5>
                        @endif
									<h5><b class="rol">{{ $item['rol'] }}</b></h5>
								</div>
								{{-- <h5 class="nombre">{{ ucwords($item['nombre']) }}</h5> --}}
							</a>
						</li>
						@endif
					@else
					@if($item['idpatrocinador'] == $referidoBase['ID'] && $item['nivel'] == 1)
					<li>
						<a href="{{ route('moretree', $item['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del">
							<img title="{{ ucwords($item['nombre']) }}" src="{{ asset('/arbol/'.$item['picture'])}}" style="width:35px">
							<div class="inforuser">
								<h3><img title="{{ ucwords($item['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $item['avatar'] }}"></h3>
								<h4>{{ ucwords($item['nombre']) }}</h4>
								<h5><span>Ingreso</span>: <b>{{ date('d-m-Y', strtotime($item['fechaingreso'])) }}</b></h5>
								<h5>ID: {{ $item['ID'] }}</b></h5>
								
								@if (!empty($settingPuntos))
                        <h5>Personales: {{ $item['personales'] }}</b></h5>
                        <h5>Red: {{ $item['red'] }}</b></h5>
                        @endif
								<h5><b class="rol">{{ $item['rol'] }}</b></h5>
							</div>
							{{-- <h5 class="nombre">{{ ucwords($item['nombre']) }}</h5> --}}
							{{-- nivel2 --}}
							<ul class="nivel2">
								@foreach ($referidosAll as $elemento)
								@if($elemento['subreferido'] == 0)
									@if($elemento['idpatrocinador'] == $item['ID'] && $elemento['nivel'] == 2)
									<li>
										<a href="{{ route('moretree', $elemento['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="">
											<img title="{{ ucwords($elemento['nombre']) }}" src="{{ asset('/arbol/'.$elemento['picture'])}}"
											style="width:35px">
											<div class="inforuser">
												<h3><img title="{{ ucwords($elemento['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento['avatar'] }}"></h3>
												<h4>{{ ucwords($elemento['nombre']) }}</h4>
												<h5><span>Ingreso</span>: <b>{{ date('d-m-Y', strtotime($elemento['fechaingreso'])) }}</b></h5>
												
										<h5>ID: {{ $elemento['ID'] }}</b></h5>		
									 @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento['red'] }}</b></h5>
                        @endif
												<h5><b class="rol">{{ $elemento['rol'] }}</b></h5>
											</div>
											{{-- <h5 class="nombre">{{ ucwords($elemento['nombre']) }}</h5> --}}
										</a>
									</li> 
									@endif
								@else
								@if($elemento['idpatrocinador'] == $item['ID'] && $elemento['nivel'] == 2)
								<li>
									<a href="{{ route('moretree', $elemento['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del2">
										<img title="{{ ucwords($elemento['nombre']) }}" src="{{ asset('/arbol/'.$elemento['picture'])}}"
										 style="width:35px">
										<div class="inforuser">
											<h3><img title="{{ ucwords($elemento['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento['avatar'] }}"></h3>
											<h4>{{ ucwords($elemento['nombre']) }}</h4>
											<h5><span>Ingreso</span>: <b>{{ date('d-m-Y', strtotime($elemento['fechaingreso'])) }}</b></h5>
											
										<h5>ID: {{ $elemento['ID'] }}</b></h5>	
									@if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento['red'] }}</b></h5>
                        @endif
											<h5><b class="rol">{{ $elemento['rol'] }}</b></h5>
										</div>
										{{-- <h5 class="nombre">{{ ucwords($elemento['nombre']) }}</h5> --}}
										
										{{-- nivel 3 --}}
                                        <ul class="nivel3">
                                            @foreach ($referidosAll as $elemento2)
                                            @if($elemento2['subreferido'] == 0)
                                            @if($elemento2['idpadre'] == $elemento['ID'] && $elemento2['nivel'] == 3)
                                            <li>
                                                <a href="{{ route('moretree', $elemento2['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif">
                                                    <img title="{{ ucwords($elemento2['nombre']) }}" src="{{ asset('/arbol/'.$elemento2['picture'])}}"
                                                        style="width:35px">
                                                    <div class="inforuser">
                                                        <h3><img title="{{ ucwords($elemento2['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento2['avatar'] }}"></h3>
                                                        <h4>{{ ucwords($elemento2['nombre']) }}</h4>
                                                        
                                                        <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                                strtotime($elemento2['fechaingreso'])) }}</b></h5>
                                       <h5>ID: {{ $elemento2['ID'] }}</b></h5>
                                                                
                                        @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento2['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento2['red'] }}</b></h5>
                        @endif
                                                        <h5><b class="rol">{{ ucwords($elemento2['rol']) }}</b></h5>
                                                    </div>
                                                    {{-- <h5 class="nombre">{{ ucwords($elemento2['nombre']) }}</h5> --}} 
                                                </a>
                                            </li>
                                            @endif
                                            @else
                                    @if($elemento2['idpadre'] == $elemento['ID'] && $elemento2['nivel'] === 3)
                                     <li>
                                    <a href="{{ route('moretree', $elemento2['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del3">
                                        
                                        <img title="{{ ucwords($elemento2['nombre']) }}" src="{{ asset('/arbol/'.$elemento2['picture'])}}"
                                            style="width:35px">
                                        <div class="inforuser">
                                            <h3><img title="{{ ucwords($elemento2['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento2['avatar'] }}" ></h3>
                                            <h4>{{ ucwords($elemento2['nombre']) }}</h4>
                                            <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                    strtotime($elemento2['fechaingreso'])) }}</b></h5>
                                                
                                        <h5>ID: {{ $elemento2['ID'] }}</b></h5>            
                                    @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento2['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento2['red'] }}</b></h5>
                        @endif        
                                            <h5><b class="rol">{{ $elemento2['rol'] }}</b></h5>
                                        </div>
                                        {{-- <h5 class="nombre">{{ ucwords($elemento2['nombre']) }}</h5> --}}
                                        
                                        
                                        
                                        {{-- nivel 4 --}}
                                        <ul class="nivel4">
                                            @foreach ($referidosAll as $elemento3)
                                            @if($elemento3['subreferido'] == 0)
                                            @if($elemento3['idpadre'] == $elemento2['ID'] && $elemento3['nivel'] == 4)
                                            <li>
                                                <a href="{{ route('moretree', $elemento3['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del3">
                                                    <img title="{{ ucwords($elemento3['nombre']) }}" src="{{ asset('/arbol/'.$elemento3['picture'])}}"
                                                        style="width:35px">
                                                    <div class="inforuser">
                                                        <h3><img title="{{ ucwords($elemento3['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento3['avatar'] }}"></h3>
                                                        <h4>{{ ucwords($elemento3['nombre']) }}</h4>
                                                        
                                                        <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                                strtotime($elemento3['fechaingreso'])) }}</b></h5>
                                       <h5>ID: {{ $elemento3['ID'] }}</b></h5>
                                                                
                                        @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento3['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento3['red'] }}</b></h5>
                        @endif
                                                        <h5><b class="rol">{{ ucwords($elemento3['rol']) }}</b></h5>
                                                    </div>
                                                    {{-- <h5 class="nombre">{{ ucwords($elemento3['nombre']) }}</h5> --}} 
                                                </a>
                                            </li>
                                            @endif
                                            @else
                                    @if($elemento3['idpadre'] == $elemento2['ID'] && $elemento3['nivel'] === 4)
                                     <li>
                                    <a href="{{ route('moretree', $elemento3['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del4">
                                        <img title="{{ ucwords($elemento3['nombre']) }}" src="{{ asset('/arbol/'.$elemento3['picture'])}}"
                                            style="width:35px">
                                        <div class="inforuser">
                                            <h3><img title="{{ ucwords($elemento3['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento3['avatar'] }}" ></h3>
                                            <h4>{{ ucwords($elemento3['nombre']) }}</h4>
                                            <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                    strtotime($elemento3['fechaingreso'])) }}</b></h5>
                                                
                                        <h5>ID: {{ $elemento3['ID'] }}</b></h5>            
                                    @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento3['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento3['red'] }}</b></h5>
                        @endif        
                                            <h5><b class="rol">{{ $elemento3['rol'] }}</b></h5>
                                        </div>
                                        {{-- <h5 class="nombre">{{ ucwords($elemento3['nombre']) }}</h5> --}}
                                        
                                        
                                        
                                        
                                        {{-- nivel 5 --}}
                                        <ul class="nivel5">
                                            @foreach ($referidosAll as $elemento4)
                                            @if($elemento4['subreferido'] == 0)
                                            @if($elemento4['idpadre'] == $elemento3['ID'] && $elemento4['nivel'] == 5)
                                            <li>
                                                <a href="{{ route('moretree', $elemento4['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del4">
                                                    <img title="{{ ucwords($elemento4['nombre']) }}" src="{{ asset('/arbol/'.$elemento4['picture'])}}"
                                                        style="width:35px">
                                                    <div class="inforuser">
                                                        <h3><img title="{{ ucwords($elemento4['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento4['avatar'] }}"></h3>
                                                        <h4>{{ ucwords($elemento4['nombre']) }}</h4>
                                                        
                                                        <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                                strtotime($elemento4['fechaingreso'])) }}</b></h5>
                                       <h5>ID: {{ $elemento4['ID'] }}</b></h5>
                                                                
                                        @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento4['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento4['red'] }}</b></h5>
                        @endif
                                                        <h5><b class="rol">{{ ucwords($elemento4['rol']) }}</b></h5>
                                                    </div>
                                                    {{-- <h5 class="nombre">{{ ucwords($elemento4['nombre']) }}</h5> --}} 
                                                </a>
                                            </li>
                                            @endif
                                            @else
                                    @if($elemento4['idpadre'] == $elemento3['ID'] && $elemento4['nivel'] === 5)
                                     <li>
                                    <a href="{{ route('moretree', $elemento4['ID']) }}@if(!empty(request()->user))?user={{request()->user}} @endif" class="del5">
                                        <img title="{{ ucwords($elemento4['nombre']) }}" src="{{ asset('/arbol/'.$elemento4['picture'])}}"
                                            style="width:35px">
                                        <div class="inforuser">
                                            <h3><img title="{{ ucwords($elemento4['nombre']) }}" src="{{  asset('/avatar/') }}/{{ $elemento4['avatar'] }}" ></h3>
                                            <h4>{{ ucwords($elemento4['nombre']) }}</h4>
                                            <h5><span>Ingreso</span>: <b>{{ date('d-m-Y',
                                                    strtotime($elemento4['fechaingreso'])) }}</b></h5>
                                                
                                        <h5>ID: {{ $elemento4['ID'] }}</b></h5>            
                                    @if (!empty($settingPuntos))
                        <h5>Personales: {{ $elemento4['personales'] }}</b></h5>
                        <h5>Red: {{ $elemento4['red'] }}</b></h5>
                        @endif        
                                            <h5><b class="rol">{{ $elemento4['rol'] }}</b></h5>
                                        </div>
                                        {{-- <h5 class="nombre">{{ ucwords($elemento4['nombre']) }}</h5> --}}
                                            @endif
                                            @endif
                                            @endforeach
                                        </ul>
                                    </a>
                                </li>
                                            @endif
                                            @endif
                                            @endforeach
                                        </ul>
                                    </a>
                                </li>
                                            @endif
                                            @endif
                                            @endforeach
                                        </ul>
                                    </a>
                                </li>
                                @endif
                                @endif
                                @endforeach
                            </ul>
                        </a>
                    </li>
                    @endif
                    @endif
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="col-md-2">
	@if ($principal == 'NO')
	<center> <a href="{{ route('referraltree')}}@if(!empty(request()->user))?user={{request()->user}} @endif">Regresar a mi árbol</a></center>
	@endif
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
		$(".nivel2 .del").remove()
		$(".nivel3 .del2").remove()
	})
</script>
@endpush