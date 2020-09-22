<div class="row">
    <div class="col-md-6">
        <div class="box" style="border-radius: 20px; background-color: #313335; border-top: 0;">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                         <h4 class="box-title white">Ganancias</h4>

                        {{-- <p class="text-center">
                            <strong>Ventas: 1 Ene, 2019 - 30 Jul, 2019</strong>
                        </p> --}}

                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <div style="height: 315px;">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                {{--<div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <div class="description-block border-right">
                                <!--<span class="description-percentage text-green"><i class="fa fa-caret-up"></i>
                                    17%</span>-->
                                <h5 class="description-header">$ {{number_format($totalventas, 2 , "." , ",") . "\n"}}</h5>
                                <span class="description-text">TOTAL Ventas</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <!--<div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right">
                                <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i>
                                    0%</span>-->
                                <!--<h5 class="description-header">$10,390.90</h5>
                                <span class="description-text">TOTAL Ganancia</span>
                            </div>
                        </div>-->
                        <!-- /.col -->
                        <div class="col-sm-6 col-xs-6">
                            <div class="description-block border-right">
                                <!--<span class="description-percentage text-green"><i class="fa fa-caret-up"></i>
                                    20%</span>-->
                                <h5 class="description-header">$ {{number_format($totalcobrado, 2 , "." , ",") . "\n"}}</h5>
                                <span class="description-text">TOTAL Cobrado</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>--}}
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="col-md-6">
        <!-- MAP & BOX PANE -->
        <div class="box"style="border-radius: 20px; background-color: #313335; border-top: 0;">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h4 class="box-title white">Usuarios</h4>
                        <div class="pad">
                            <!-- Map will be created here -->
                            <div id="world-map-markers" style="height: 330px;">
                                <canvas id="chart_usuarios"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="box-footer border-radius" style="margin-top: 40px;">
                    <div class="col-md-12 col-sm-12">
                        <div class="pad box-pane-right bg-green" style="border-radius: 20px;">
                            <div class="description-block">
                                <div class="sparkbar pad" id="acti" data-color="#fff"></div>
                                <h5 class="description-header">Activos</h5>
                            </div>
                            <div class="description-block">
                                <div class="sparkbar pad" id="ina" data-color="#fff"></div>
                                <h5 class="description-header">Inactivos</h5>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@push('script')
<!-- chart.js charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
{{-- <script type="text/javascript" src="{{asset('assets/AdminLTE-2.4.12/bower_components/chart.js/Chart.js')}}"></script> --}}
{{-- graficas --}}
<script type="text/javascript" src="{{ asset('assets/scripts/graficascustom.js') }}"></script>
@endpush