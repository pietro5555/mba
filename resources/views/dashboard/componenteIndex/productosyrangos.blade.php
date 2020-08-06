<div class="row">
    <div class="col-md-6">
        <!-- Info Boxes Style 2 -->
        <div class="box box-default" style="border-radius: 20px;">
            <div class="box-header with-border">
                <h3 class="box-title">Rangos</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        @foreach($rangos as $rango)
                        <div class="">
                            <span class="pull-right text-primary">{{$rango->cantidad}} / {{$cantAllUsers}}</span>
                            <span>{{$rango->name}}</span>
                        </div>
                        @if($rango->cantidad > 0)
                        <div class="progress progress-xs m-t-sm bg-white">
                            <div class="progress-bar bg-primary" data-toggle="tooltip"
                                data-original-title="{{ (($rango->cantidad * 100) / $cantAllUsers) }}%"
                                style="width: {{ (($rango->cantidad * 100) / $cantAllUsers) }}%"></div>
                        </div>
                        @else
                        <div class="progress progress-xs m-t-sm bg-white">
                            <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="0%"
                                style="width: 0%"></div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->

        <!-- PRODUCT LIST -->

        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box box-primary" style="border-radius: 20px;">
            <div class="box-header with-border">
                <h3 class="box-title">Productos Recientes</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @php
                    $limite = 0;
                    @endphp
                    @foreach ($productosnuevos as $item)
                    @if ($limite < 2) <li class="item">
                        <div class="product-img">
                            <img src="{{$item->img}}" alt=" " style=" width: 50px; height: 50px; border-radius: 50%;">
                        </div>
                        <div class="product-info">
                            <a href="{{$item->guid}}" target="_blank" class="product-title">{{$item->post_title}}
                                <span class="label label-warning pull-right">
                                    @if ($moneda->mostrar_a_d)
                                    {{$moneda->simbolo}} {{$item->meta_value}}
                                    @else
                                    {{$item->meta_value}} {{$moneda->simbolo}}
                                    @endif
                                </span>
                            </a>
                            <span class="product-description">
                                {{$item->post_content}}
                            </span>
                        </div>
                        </li>
                        @endif
                        @php
                        $limite++;
                        @endphp
                        @endforeach

                        <!-- /.item -->
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center border-radius">
                <a href="{{route('tienda-index')}}" class="uppercase">Ver Todos</a>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>