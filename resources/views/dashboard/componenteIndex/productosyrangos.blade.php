<style type="text/css">
    .table>thead>tr>th {
    border-bottom: 0;
   }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="info-box border-radius" style="border-radius: 20px;">
      <div class="box-body" style="padding: 15px 20px;">
        <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #007bff; color: white;">Últimos Pedidos</h3>
          
          <div class="table-responsive">
          <table class="table table-dark">
            <thead>
              <tr>
                <th class="text-center">Orden</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($ordenesView as $compra)
              <tr>
                <td class="text-center">
                  {{$compra['ordenID']}}
                </td>
                <td class="text-center">
                  {{$compra['items']}}
                </td>
                <td class="text-center">
                  {{$compra['estadoCompra']}}
                </td>
                <td class="text-center">
                  {{date('d-m-Y', strtotime($compra['fechaOrden']))}}
                </td>
              </tr>
              @endforeach
          </table>
        </div>

        </div>
     </div>
  </div>
</div>