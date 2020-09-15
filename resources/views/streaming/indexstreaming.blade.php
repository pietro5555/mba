@extends('layouts.dashboardnew')

@section('content')



<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          
            <h1>Test de Streaming</h1>
         

            <a href="https://authentication.video.ibm.com/authorize?response_type=code&client_id=ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019&redirect_uri=http://localhost:8000/&state=XYZ" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Obtener Autorización
            </a>

            <a href="{{url('/getaccesstoken')}}" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Obtener Token
            </a>

            <iframe src="https://video.ibm.com/combined-embed/23961562?videos=gallery" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="952" height="624"></iframe>

        </div>
    </div>

</div>

@endsection
