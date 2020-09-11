@extends('layouts.landing')

@section('content')
    <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col">
            <div class="section-title-landing" style="padding-bottom: 35px; text-align:center;">
                @if ($page == 'search')
                    CURSOS RELACIONADOS
                @else
                    CURSOS DE LA CATEGORÍA<br>
                    <b>{{ strtoupper($categoria->title) }}</b>
                @endif
            </div>
        </div>     
             
        <div class="row">
            @if ($cursos->count() > 0)
                @foreach ($cursos as $curso)
                    <div class="col-md-3" style="margin-top: 20px;">
                        <img src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" class="card-img-top" alt="..." style="height: 200px;"> 
                
                        <div class="card-body" style="background-color: #2f343a;">
                            <h6 class="card-title" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> {{ $curso->title }}</h6>
                
                            <h6 style="font-size: 10px; margin-left: 20px; margin-top: -10px;">{{ $curso->category->title }} ({{ $curso->subcategory->title }})</h6>
                
                            <h6 align="right" style="margin-bottom: -20px;"> 
                                <i class="icon fa fa-eye" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">1310</p></i>
                                <i class="far fa-comment-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">346</p></i>
                                <i class="fas fa-share-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">862</p></i>
                                <i class="far fa-thumbs-up" style="font-size: 16px;"><p style="font-size: 10px;">1243</p></i>
                            </h6>
                        </div>
                    </div>
                @endforeach
            @else
                No se encontraron cursos relacionados con la búsqueda...
            @endif
        </div>
    </div>
@endsection