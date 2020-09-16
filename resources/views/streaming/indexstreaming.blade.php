@extends('layouts.dashboardnew')

@section('content')



<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          
            <h1>Test de Streaming</h1>
         

            <a href="https://authentication.video.ibm.com/authorize?response_type=code&client_id=ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019&redirect_uri=http://localhost:8000/getaccesstoken/&state=XYZ" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Obtener Autorización
            </a>

            <a href="{{url('/getaccesstoken')}}" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Obtener Token
            </a>

             <a href="{{ route('streaming.new-channel') }}" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Crear Canal
            </a>

            <!--<iframe src="https://video.ibm.com/combined-embed/23961562?videos=gallery" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="952" height="624"></iframe>-->

            <iframe src="rtmp://23961562.fme.ustream.tv/ustreamVideo/23961562" frameborder="0" width="1000" height="1000"></iframe>

        </div>
    </div>

</div>

@endsection
