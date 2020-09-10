@extends('layouts.dashboardnew')

@section('content')



<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          
            <h1>Test de Streaming</h1>
            <!-- https://authentication.video.ibm.com/authorize?response_type=code&client_id=ca361d98cfa63255356b644e83130e919e62085e&redirect_uri=http://localhost:8000/&state=XYZ -->
            <!-- http://localhost:8000/?access_token=a0789036b25d11d4774d09a2b76a7aadbc2d799e&token_type=bearer&expires_in=86400&state=XYZ -->
            <!-- http://localhost:8000/?code=2b889e59cfbf4efac57fb43a37ccc3a1b31a5047&state=XYZ -->

            <a href="https://authentication.video.ibm.com/authorize?response_type=token&client_id=ca361d98cfa63255356b644e83130e919e62085e&client_secret=ea6b8144deeec575c3d327faa8015b5729d43ddf&redirect_uri=http://localhost:8000/&state=XYZ" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
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
