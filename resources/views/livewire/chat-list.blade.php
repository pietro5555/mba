<div style="overflow: hidden !important; height:400px;" class="d-flex align-items-end col-12">
    <div class="row">
    @foreach ($mensajes as $mensaje)
            {{-- <div class="col pt-2 logo-user">
                <div>
                    <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" alt=""
                        class="rounded-circle logo-username-green">
                    </div>
            </div> --}}
                
            <div class="alert p-1 col-10 @if ($mensaje['usuario'] == Auth::user()->display_name) ml-3 @else mr-3 @endif" style="background: #545762" role="alert">
                <h5 class="nombre-jd">
                    <img src="{{ $mensaje['avatar'] }}" alt="" class="rounded-circle logo-username-green">
                    {{$mensaje['usuario']}}
                </h5>
                <span class="ml-2">
                    {{$mensaje['mensaje']}}
                </span>
            </div>
            @endforeach
    </div>
</div>
