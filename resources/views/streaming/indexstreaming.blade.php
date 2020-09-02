@extends('layouts.dashboardnew')

@section('content')



<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          
            <h1>Test de Streaming</h1>

            <a href="https://authentication.video.ibm.com/authorize?response_type=token&client_id=ca361d98cfa63255356b644e83130e919e62085e&client_secret=ea6b8144deeec575c3d327faa8015b5729d43ddf&redirect_uri=http://localhost:8000/&state=XYZ" class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                Obtener Token
            </a>

        </div>
    </div>

</div>

@endsection
