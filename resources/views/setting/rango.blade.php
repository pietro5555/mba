@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            {{-- información --}}
            @include('setting.componentes.infoRango')
            {{-- formularios --}}
            @include('setting.componentes.formRango')
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
        function toggle() {
            $('.mostrar').toggle('slow')
        }
    
        function detalleRango() {
            $('#rango').empty()
            let cantRango = (parseInt($('#cantrango').val()) + 1)
            let cantNivel = (parseInt($('#cantnivel').val()) + 1)
            let sReferidos = $('#s_referido').val()
            let sReferidosD = $('#s_referidoD').val()
            let sReferidosInd = $('#s_referidoind').val()
            let sReferidosAct = $('#s_referidoact').val()
            let sTotalPuntos = $('#s_personal').val()
            let sTotalPuntosGrupales = $('#s_grupal').val()
            let sTotalComisiones = $('#s_comisiones').val()
            let sRolNecesario = $('#s_rolnecesario').val()
            let sBono = $('#s_bono').val()
            let sNivel = $("#s_nivel").val()
            let divrango = ''
            if (sTotalPuntos == '1' || sTotalPuntosGrupales == '1') {
                $('#vpuntos').show()
            } else {
                $('#vpuntos').hide()
            }
            for (let i = 1; i < cantRango; i++) {
                divrango = divrango + '<div class="form-group col-xs-12">' +
                    '<h5>Rango ' + i + '</h5>' +
                    '<div class="col-xs-12">' +
                    '<label for="">Nombre Rango ' + i + '</label>' +
                    '<input class="form-control" type="text" name="nombrerango' + i + '" required>' +
                    '</div>'
                // agregar referidos directos
                if (sReferidosD == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Cantidad Referidos Directos</label>' +
                        '<input class="form-control" type="number" name="cantrefed' + i + '" required>' +
                        '</div>'
                }
                // agregar referidos indirectos
                if (sReferidosInd == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Cantidad Referidos Indirectos</label>' +
                        '<input class="form-control" type="number" name="cantrefeind' + i + '" required>' +
                        '</div>'
                }
                // agregar todos los referidos
                if (sReferidos == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Cantidad Referidos</label>' +
                        '<input class="form-control" type="number" name="cantrefe' + i + '" required>' +
                        '</div>'
                }
                // agregar referidos activos
                if (sReferidosAct == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Cantidad Referido Activo</label>' +
                        '<input class="form-control" type="number" name="cantrefeact' + i + '" required>' +
                        '</div>'
                }
                // agregar puntos personales
                if (sTotalPuntos == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Total Puntos Personales</label>' +
                        '<input class="form-control" type="number" name="totalpunto' + i + '" required>' +
                        '</div>'
                }
                // agregar puntos globales o de la red o generales
                if (sTotalPuntosGrupales == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Total Puntos Grupales</label>' +
                        '<input class="form-control" type="number" name="totalpuntoG' + i + '" required>' +
                        '</div>'
                }
                // agregar total de comisiones
                if (sTotalComisiones == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Total Comisiones</label>' +
                        '<input class="form-control" type="number" name="totalcomi' + i + '" required>' +
                        '</div>'
                }
                // agregar si afecta un nivel
                if (sNivel == '1') {
                    let tmp = ""
                    for (let i = 1; i < cantNivel; i++) {
                        tmp = tmp + '<option value="' + i + '">Nivel ' + i + '</option>'
                    }
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Nivel que Afecta</label>' +
                        '<select class="form-control" name="nivelafec' + i + '" required>' +
                        '<option value="" selected disabled>Seleccione una opción</option>' +
                        '<option value="0">No Aplica</option>' +
                        tmp +
                        '</select>' +
                        '</div>'
                }
                // agregar si recibe un bono
                if (sBono == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                        '<label for="">Bono Recibido</label>' +
                        '<input class="form-control" type="number" name="totalbono' + i + '" required>' +
                        '</div>'
                }
                let tmp = ""
                for (let i = 1; i < cantRango; i++) {
                    tmp = tmp + '<option value="' + i + '">Rango ' + i + '</option>'
                }
                // agregar si utiliza los roles necesarios
                if (sRolNecesario == '1') {
                    divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                    '<label for="">Rango Necesarios en Red (rango y cantidad)</label>' +
                    '<div class="col-xs-6"><select class="form-control" name="rangonecesario' + i + '" required>' +
                    '<option value="" selected disabled>Seleccione una opción</option>' +
                    '<option value="0">No Aplica</option>' +
                    tmp +
                    '</select></div>' +
                    '<div class="col-xs-6"><input class="form-control" type="number" name="rangonececant' + i + '" required></div>' +
                    '</div>'
                }
                divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                    '<label for="">Rango Previo Nesesario</label>' +
                    '<select class="form-control" name="rangoprevio' + i + '" required>' +
                    '<option value="" selected disabled>Seleccione una opción</option>' +
                    '<option value="0">No Aplica</option>' +
                    tmp +
                    '</select>' +
                    '</div>'
                divrango = divrango + '<div class="col-sm-4 col-xs-12">' +
                    '<label for="">Permite Cobrar Comisiones</label>' +
                    '<select class="form-control" name="p_cobrar_comision' + i + '" required>' +
                    '<option value="" selected disabled>Seleccione una opción</option>' +
                    '<option value="0">No</option>' +
                    '<option value="1">SI</option>' +
                    '</select>' +
                    '</div>'
                divrango = divrango + '</div>'
            }
            $('#rango').append(divrango)
        }
    </script>
@endpush