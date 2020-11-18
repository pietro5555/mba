<!-- jQuery 3 -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/morris.js/morris.min.js')}}"></script>
{{-- Chart Js --}}
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}">
</script>
<!-- jvectormap -->
<script src="{{asset('assets/AdminLTE-2.4.12/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/AdminLTE-2.4.12/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}">
</script>
<!-- datepicker -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}">
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/AdminLTE-2.4.12/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/AdminLTE-2.4.12/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!--DATATABLES-->
<script type="text/javascript" language="javascript" src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/AdminLTE-2.4.12/dist/js/adminlte.min.js')}}"></script>
{{-- Sweetalert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

{{-- include summernote js --}}
<script type="text/javascript" language="javascript" src="{{ asset('assets/summernote-develop/dist/summernote.js') }}"></script>
{{-- demo js --}}
<script src="{{asset('assets/AdminLTE-2.4.12/dist/js/demo.js')}}"></script>

{{-- full calendar --}}
<script src="{{ asset('assets/calendario/moment.min.js')}}"></script>
<script src="{{ asset('assets/calendario/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/calendario/idioma/es.js')}}"></script>

{{-- mensajes push --}}
<script src="{{ asset('assets/push/push-js-master/bin/push.js')}}"></script>

{{-- Script para el choosen --}}
  <script src="{{ asset('assets/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('assets/chosen/ImageSelect.jquery.js') }}"></script>

{{-- drop--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

{{-- Bootstrap Toggle --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@include('layouts.include.push')

<script type="text/javascript">
$('.toggle').on('click',function(e){
 e.preventDefault();

   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   $('.mostrar').toggle('slow')
    }
  });
});
</script>

<script type="text/javascript">
$('#modal').on('click',function(e){
 e.preventDefault();

   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   $('#myModal2').modal();
    }
  });
});
</script>

<script type="text/javascript">
$('#modal3').on('click',function(e){
 e.preventDefault();

   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   $('#myModal3').modal();
    }
  });
});

//activar propovers
$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>
