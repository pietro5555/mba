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
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-home"></i> Home</a>
                    @if(Auth::user())
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-asterisk"></i> Live Streames</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user-circle"></i> Cursos</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user"></i> Referidos</a>
                    @endif
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-search"></i> Explorar</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-border-all"></i> Categorías</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-file-alt"></i> Test</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-gear"></i> Ajustes</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-question-circle"></i> Ayuda</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-flag"></i> Informes</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->