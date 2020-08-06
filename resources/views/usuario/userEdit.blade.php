@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
	
			@media only screen and (min-width: 992px) {
	    .ajustar{
	        width: 14%;
	    }
	    .aumentar{
	        width: 16.66666667%;
	    }
	}
	</style>
@endpush

{{-- resumen --}}
@include('usuario.formEdit.resumen')

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">informacion Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Informacion de contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Perfil Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="bancaria-tab" data-toggle="tab" href="#bancaria" role="tab"
                        aria-controls="bancaria" aria-selected="false">Informacion bancaria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pagos-tab" data-toggle="tab" href="#pagos" role="tab" aria-controls="pagos"
                        aria-selected="false">Pagos</a>
                </li>
            </ul>
            <!-- Aquí es informacion personal -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('usuario.formEdit.personal', ['controler' => $data['controler']])
                </div>
                <!-- termina informacion personal -->

                <!-- Empieza informacion de Contacto -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('usuario.formEdit.contacto', ['controler' => $data['controler']])
                </div>
                <!-- Termina informacion de Contacto -->

                <!-- Empieza PErfil Social -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @include('usuario.formEdit.social', ['controler' => $data['controler']])
                </div>
                <!-- Termina Perfil Social -->

                <!-- Empieza Informaion Bancaria -->
                <div class="tab-pane fade" id="bancaria" role="tabpanel" aria-labelledby="bancaria-tab">
                    @include('usuario.formEdit.bancario', ['controler' => $data['controler']])
                </div>
                <!-- Termina Informaion Bancaria -->

                <!-- Empieza Pagos -->
                <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
                    @include('usuario.formEdit.pago', ['controler' => $data['controler']])
                </div>
            </div>
            <!-- Termina Pago -->
        </div>
    </div>
</div>
@if($yo != null)
<div class="col-md-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.verusuario', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="far fa-address-book" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Perfil</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.ingresos', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-money-bill-alt" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Ingresos</center>
									</div>
								</div>
							</div>
					</div>
					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.referidos', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="far fa-user-circle" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Referidos</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.wallet', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-wallet" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Monedero</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.pago', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-money-check" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Liberados</center>
									</div>
								</div>
							</div>
				        </div>
				        
				        
				        <div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('genealogia', ['id' => $yo, 'tipo' => 'Normal']) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-sitemap" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Genealogia Usuarios</center>
									</div>
								</div>
							</div>
				        </div>
				        
				        @if($settingCliente->cliente == 1)
				        <div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('genealogia', ['id' => $yo, 'tipo' => 'Cliente']) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-sitemap" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Genealogia Clientes</center>
									</div>
								</div>
							</div>
				        </div>
				        @endif
				@endif
				
				
	
	
	
	<!-- Ingresar Codigo -->   
<div class="modal fade" id="codigoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar Codigo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('calendario-guardar')}}" method="post">
          {{ csrf_field() }} 
          
          <div class="col-md-12" id="cod">
              
          </div>
          
          <input type="hidden" name="numero" id="numero">
          
          <input type="hidden" name="tipo" id="tipo">
          
          <div class="col-md-12">
            <label>Codigo</label>
            <input type="text" class="form-control" name="codigo" required onkeyup="verificarCodigo(this.value)">
               </div>
               
               
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 			
				
@endsection
@push('script')
<script>
    
    function cancelarPersonal() {
        $('.personal').attr('disabled', true)
        $('#botom0').hide('slow')
    }
    

    function cancelarContacto() {
        $('.contacto').attr('disabled', true)
        $('#botom1').hide('slow')
        $('.botom1').hide('slow')
    }

    function cancelarSocial() {
        $('.social').attr('disabled', true)
        $('#botom2').hide('slow')
    }

    function cancelarBanco() {
        $('.banco').attr('disabled', true)
        $('#botom3').hide('slow')
    }

    function cancelarPago() {
        $('.pago').attr('disabled', true)
        $('#botom4').hide('slow')
    }
    
    
    function modalCodigo(numero, tipo){
        
        if({{Auth::user()->rol_id}} != '0'){
        $.get('enviocodigo/{{Auth::user()->ID}}', function (response) {
            
            $('#cod').empty()
            
            $('#cod').append(
        '<div class="alert alert-info" role="alert">' +        
          '<h5> Se a enviado un codigo a su correo electrónico</h5>'+
         '</div>'
        )
            
            $('#numero').val(numero)
            $('#tipo').val(tipo)
            $('#codigoModal').modal();
         })
       }else{
           
           $('.'+tipo).attr('disabled', false)
           $('#botom'+numero).show('slow')
           
           if(tipo == 'contacto'){
              $('.botom'+numero).show('slow') 
           }
       }
    }
    
    
    function verificarCodigo(valor){
        
        var productos = null
        
        $.get('verificarcodigo/{{Auth::user()->ID}}/'+valor, function (response){
            productos = JSON.parse(response)
            
            if (productos.length <= 0) {
        $('#cod').empty()
        $('#cod').append(
          '<div class="alert alert-danger" role="alert">' +
          '<h5> <b>Aviso:</b> El codigo ingresado es Incorrcto</h5>' +
          '</div>'
        )
      }else{
          $('#cod').empty()
          $('#cod').append(
          '<div class="alert alert-success" role="alert">' +
          '<h5> <b>Aviso:</b> El codigo ingresado es Correcto por favor espere 5 segundos</h5>' +
          '</div>'
            )
            
            setTimeout(activarPerfil, 3000);
          }
        })
      
    }
    
    
    function activarPerfil(){
        
        let numero = $('#numero').val()
        let tipo = $('#tipo').val()
        
        $('.'+tipo).attr('disabled', false)
        $('#botom'+numero).show('slow')
        $('#codigoModal').modal('hide');
        
        if(tipo == 'contacto'){
              $('.botom'+numero).show('slow') 
         }
    }
    
</script>
@endpush