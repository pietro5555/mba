{{-- transferencias --}}
<!-- Info boxes -->
<div class="row">
  <div class="col-md-12">
     <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Transaferencias</h3>
        <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      
      
       <div class="box-body">
      
     <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                
                        <th class="text-center">
                            Fecha
                        </th>
                        <th class="text-center">
                            Descripción
                        </th>
                        <th class="text-center">
                            Descuento
                        </th>
                        <th class="text-center">
                            Ingreso
                        </th>
                        <th class="text-center">
                            Retiro
                        </th>
                        <th class="text-center">
                            Balance
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billeteras as $wallet)
                    <tr>
                        <td class="text-center">
                            {{$wallet->id}}
                        </td>
                      
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($wallet->created_at))}}
                        </td>
                        <td class="text-center">
                            {{$wallet->descripcion}}
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->descuento}}
                            @else
                            {{$wallet->descuento}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->debito}}
                            @else
                            {{$wallet->debito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->credito}}
                            @else
                            {{$wallet->credito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->balance}}
                            @else
                            {{$wallet->balance}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
      
    </div>
  </div>
</div>  