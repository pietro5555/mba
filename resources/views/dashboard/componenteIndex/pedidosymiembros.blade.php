<div class="row">
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger" style="border-radius: 20px;">
      <div class="box-header with-border">
        <h3 class="box-title">Ultimos Miembros</h3>
        <div class="box-tools pull-right">
          <span class="label label-danger">{{count($new_member)}} New Members</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          @foreach ($new_member as $member)
          <li>
            <img class="imas" src="{{asset('assets/img/member.jpg')}}" height="128" alt="">
            @if (Auth::user()->ID == 1)
            <a class="users-list-name" href="#">{{$member->display_name}}</a>
            <span class="users-list-date">{{date('d-m-Y', strtotime($member->created_at))}}</span>
            @else
            <a class="users-list-name" href="#">{{$member['nombre']}}</a>
            <span class="users-list-date">{{date('d-m-Y', strtotime($member['fecha']))}}</span>
            @endif
          </li>
          @endforeach

        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center border-radius">
        @if (Auth::user()->ID)
        <a href="{{route('networkrecords')}}" class="uppercase">Ver Todos los Ususarios</a>
        @else
        <a href="{{route('admin.userrecords')}}" class="uppercase">Ver Todos los Ususarios</a>
        @endif
      </div>
      <!-- /.box-footer -->
    </div>
    <!--/.box -->
  </div>

  <div class="col-md-6">
    <div class="box box-info" style="border-radius: 20px;">
      <div class="box-header with-border">
        <h3 class="box-title">Ultimos Pedidos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th class="text-center">Orden</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $cont = 0;
              @endphp
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
              @php
                  $cont++;
              @endphp
              @endforeach
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix border-radius">
        <a href="{{route('networkorders')}}" class="btn btn-sm btn-default btn-flat pull-right">Ver Todas</a>
      </div>
      <!-- /.box-footer -->
    </div>
  </div>
</div>