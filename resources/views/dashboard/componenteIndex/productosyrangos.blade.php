<style type="text/css">
    .table>thead>tr>th {
    border-bottom: 0;
   }
   
   .ajustext{
   color: white;
   text-align: center;
   background-color: #403f3f;
   border-spacing: 0px 10px;
   }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="info-box border-radius" style="border-radius: 20px;">
      <div class="box-body" style="padding: 15px 20px;">
        <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #007bff; color: white;">Últimos Pedidos</h3>
          
          <div class="table-responsive">
          <table class="table" style="border-spacing: 0px 10px; border-collapse: separate;">
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
                <td class="ajustext" style="border-top: 0;">
                 {{$compra['ordenID']}}
                </td>
                <td class="ajustext" style="border-top: 0;">
                 {{$compra['items']}}
                </td>
                <td class="ajustext" style="border-top: 0;">
                  {{$compra['estadoCompra']}}
                </td>
                <td class="ajustext" style="border-top: 0;">
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