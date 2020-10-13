<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="row d-flex align-items-center mb-0">
                <div class="col-12 col-md-7 text-blue">
                    <h5>{{ $event->title }} / {{$event->mentor->display_name}}</h5>

                </div>
                <div class="col-12 col-md-5 clearfix">
                    <div class="row justify-content-end">
                        <div class="">
                            <h5 class="title-level">Nivel: {{$event->subcategory->title}}</h5>
                        </div>

                        <div class="p-2">
                            <a href="https://m.facebook.com/MyBusinessAcademyPro/"
                                class="btn btn-social-icon ml-2 mr-2 btn-facebook btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px">
                            </a>
                            <a href="" class="btn btn-social-icon ml-2 mr-2 btn-twitter btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px">
                            </a>
                            <a href="https://instagram.com/mybusinessacademypro?igshid=tdj5prrv1gx1"
                                class="btn btn-social-icon ml-2 mr-2 btn-instagram btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
