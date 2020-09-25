@php
    $categoriasSidebar = \App\Models\Category::orderBy('id', 'ASC')->get();
        
        $subcategoriasSidebar = \App\Models\Subcategory::orderBy('id', 'ASC')->get();
@endphp

<!-- Sidebar -->
            <div class="bg-dark-gray" id="sidebar-wrapper">
                <div class="sidebar-heading border-right" style="border-bottom: solid white 1px; height: 70px;">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('images/logo.png') }}" style="width: 40px; height: 40px;">
                        </div>
                        <div class="col-9">
                            <div style="color: white; font-size: 16px; font-weight: bold;">My Business</div> 
                            <div style="color: white; font-size: 11px; ">A c a d e m y  p r o</div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('index') }}" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-home"></i> Home</a>
                    @if(Auth::user())
                        <a href="{{route('transmisiones')}}" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-asterisk"></i> FTX Live</a>
                        <a href="{{ route('courses') }}" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user-circle"></i> Cursos</a>
                        <a href="{{url('/admin')}}" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user"></i> Referidos</a>
                    @endif
                    <a class="list-group-item bg-dark-gray" data-toggle="collapse" href="#searchDiv" style="color: white;"><i class="fa fa-search"></i> Explorar</a>
                    <div class="collapse" id="searchDiv" style="padding-left: 10px; padding-right: 10px;">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" name="q" placeholder="Buscar...">
                            </div>
                        </form>
                    </div>
                    <a class="list-group-item bg-dark-gray" data-toggle="collapse" href="#categoriesDiv" style="color: white;"><i class="fas fa-border-all"></i> Categorías <i class="fas fa-angle-down"></i></a>
                    <div class="collapse" id="categoriesDiv" style="padding-left: 15px;">
                        @foreach ($categoriasSidebar as $categoria)
                            <a class="list-group-item bg-dark-gray" data-toggle="collapse" href="#subcategories-{{$categoria->id}}" style="color: white;"><i class="{{ $categoria->icon }}"></i> {{ $categoria->title }} </a>
                            <div class="collapse" id="subcategories-{{$categoria->id}}" style="padding-left: 15px;">
                                @foreach ($subcategoriasSidebar as $subcategoria)
                                    <a class="list-group-item bg-dark-gray" href="{{ route('search-by-category', [$categoria->slug, $categoria->id, $subcategoria->slug, $subcategoria->id]) }}" style="color: white;"><i class="far fa-circle"></i> {{ $subcategoria->title }} </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    
                    @if(Auth::user())
                     @if(Auth::user()->rol_id == 0)
                    <a href="{{route('setting-logo')}}" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-gear"></i> Ajustes</a>
                     @endif
                    @endif
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-question-circle"></i> Ayuda</a>
                   
                </div>
            </div>
            <!-- /#sidebar-wrapper -->