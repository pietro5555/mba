<div>

    <div class="card card-anotaciones">
    <textarea name="mensaje" id="" cols="25" rows="3" wire:model="mensaje" style="background-color: #1C1D21; color: white;" placeholder="Escribe tu mensaje"></textarea>

        @error('mensaje')<small class="text-danger">{{$message}}</small>@enderror
        <div class="card-footer p-1 border-0">

            <div style="position: absolute" class="alert alert-success collapse p-1" role="alert" id="avisoSuccess">
                <i class="fa fa-check"></i> Mensaje enviado
            </div>
            <button class="btn btn-success float-right" type="submit" wire:click="enviarMensaje">Enviar</button>
        </div>
    </div>
</div>

{{-- <div>
    <div class="row ml-1">
            <div class="col pt-2 logo-user">
                    <div ><img src="{{ asset('uploads/avatar/'.$event->mentor->avatar) }}" alt="" class="rounded-circle
logo-username-green">
</div>
</div>
<div class="col pt-2">
    <p class="nombre-anfitrion">{{$event->mentor->display_name}}</p>
</div>

</div>
<div class="ml-1">
    <textarea class="contenido-anfitrion border-0" name="" id="" cols="24" rows="5"
        readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit.</textarea>
</div>
</div>
<div>
    <div class="row ml-1">
        <div class="col pt-2 logo-user">
            <div><img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" alt=""
                    class="rounded-circle logo-username-green"></div>
        </div>
        <div class="col pt-2">
            <p class="nombre-jd">{{Auth::user()->display_name}}</p>
        </div>

    </div>
    <div class="ml-1">
        <textarea class="contenido-anfitrion border-0" name="" id="" cols="24" rows="5"
            readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit.</textarea>
    </div>
</div>
<div>
    <div class="row ml-1">
        <div class="col pt-2 logo-user">
            <div><img src="{{ asset('uploads/avatar/'.$event->mentor->avatar) }}" alt=""
                    class="rounded-circle logo-username-green"></div>
        </div>
        <div class="col pt-2">
            <p class="nombre-anfitrion">{{$event->mentor->display_name}}</p>
        </div>

    </div>
    <div class="ml-1">
        <textarea class="contenido-anfitrion border-0 disabled" name="" id="" cols="24" rows="5"
            readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit.</textarea>
    </div>
</div>
<div>
    <div class="row ml-1">
        <div class="col pt-2 logo-user">
            <div><img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" alt=""
                    class="rounded-circle logo-username-green"></div>
        </div>
        <div class="col pt-2">
            <p class="nombre-jd">{{Auth::user()->display_name}}</p>
        </div>

    </div>
    <div class="ml-1">
        <textarea class="contenido-anfitrion border-0" name="" id="" cols="24" rows="5"
            readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit.</textarea>
    </div>
</div>
<div class="card card-anotaciones">
    <form action="">
        <textarea name="" id="" cols="25" rows="3">Escribe tu mensaje</textarea>

    </form>
    <div class="card-body">
        <div class="row">
            <span>
                <i class="em em-angry small" aria-role="presentation" aria-label="ANGRY FACE"></i>
            </span>
            <span>
                <i class="em em-anguished small" aria-role="presentation" aria-label="ANGUISHED FACE"></i>
            </span>
            <span>
                <i class="em em-astonished small" aria-role="presentation" aria-label="ASTONISHED FACE"></i>
            </span>
            <span>
                <i class="em em-adult" aria-role="presentation" aria-label="ADULT"></i>
            </span>
            <span>
                <i class="em em-angel small" aria-role="presentation" aria-label="BABY ANGEL"></i>
            </span>
            <span>
                <i class="em em-baby small" aria-role="presentation" aria-label="BABY"></i>
            </span>
            <span>
                <i class="em em---1 small" aria-role="presentation" aria-label="THUMBS UP SIGN"></i>
            </span>
            <span>
                <i class="em em--1 small" aria-role="presentation" aria-label="THUMBS DOWN SIGN"></i>
            </span>
            <span>
                <i class="em em-blush small" aria-role="presentation" aria-label="SMILING FACE WITH SMILING EYES"></i>
            </span>
            <span>
                <i class="em em-clap small" aria-role="presentation" aria-label="CLAPPING HANDS SIGN"></i>
            </span>
        </div>
        <div class="row">
            <span>
                <i class="em em-cry small" aria-role="presentation" aria-label="CRYING FACE"> </i>
            </span>
            <span>
                <i class="em em-eyes small" aria-role="presentation" aria-label="EYES"></i>
            </span>
            <span>
                <i class="em em-face_with_rolling_eyes small" aria-role="presentation"
                    aria-label="FACE WITH ROLLING EYES"></i>
            </span>
            <span>
                <i class="em em-exploding_head small" aria-role="presentation"
                    aria-label="SHOCKED FACE WITH EXPLODING HEAD"></i>
            </span>
            <span>
                <i class="em em-face_with_raised_eyebrow small" aria-role="presentation"
                    aria-label="FACE WITH ONE EYEBROW RAISED"></i>
            </span>
            <span>
                <i class="em em-dizzy_face small" aria-role="presentation" aria-label="DIZZY FACE"></i>
            </span>
            <span>
                <i class="em em-face_with_monocle small" aria-role="presentation" aria-label="FACE WITH MONOCLE"></i>
            </span>
            <span>
                <i class="em em-bookmark small" aria-role="presentation" aria-label="BOOKMARK"></i>
            </span>
            <span>
                <i class="em em-blue_book small" aria-role="presentation" aria-label="BLUE BOOK"></i>
            </span>
            <span>
                <i class="em em-100 small" aria-role="presentation" aria-label="HUNDRED POINTS SYMBOL"></i>
            </span>
        </div>
    </div>

    <div class="card-footer p-1 border-0">
        <button class="btn btn-success float-right" type="submit">Enviar</button>
    </div>
</div> --}}
