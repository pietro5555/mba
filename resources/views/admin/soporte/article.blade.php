@extends('layouts.dashboardnew')

@push('script')
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});

		function editarArticle($id){
			var route = $("#"+$id).attr('data-route');
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(response){
	                $("#article_id").val(response.id);
	                $("#title").val(response.title);
	                $("#user_id option[value="+response.user_id+"]").attr("selected", true);
                 	CKEDITOR.instances["description"].setData(response.description);
	                $("#modal-article-edit").modal("show");
	            }
	        });
		}

        function showArticle($id) {
       // var id  = $(event).data("id");
        var id = $id;
        var route = $("#"+$id).attr('data-route');
        $.ajax({
        url: route,
        type: 'GET',
        success: function(response) {
                $("#article_id_show").val(response.id);
                $("#article_title_show").val(response.title);
                CKEDITOR.instances["article_description_show"].setData(response.description);
                $("#modal-article-show").modal('show');
        }
        });
    }
	</script>
@endpush

@section('content')
	<div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
                <strong>{{ Session::get('msj-exitoso') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
			</div>
		@endif

		@if (Session::has('msj-erroneo'))
			<div class="alert alert-danger">
                <strong>{{ Session::get('msj-erroneo') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
			</div>
		@endif

		<div class="box">
			<div class="box-body">
				<div style="text-align: right;">
					<a data-toggle="modal" data-target="#modal-article-new" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i> Nuevo Artículo</a>
				</div>

				<br class="col-xs-12">
                @if(!$articles->isEmpty())
				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center col-sm-1">#</th>
							<th class="text-center col-sm-3">Título</th>
							<th class="text-center col-sm-5">Descripción</th>
							<th class="text-center col-sm-2">Acción</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($articles as $article)
							<tr>
                                <td class="text-center white">{{$article->id}}</td>
								<td class="text-center white">{{$article->title}}</td>
								<td class="text-center white">{!!$article->description!!}</td>
								<td class="text-center">
									<a class="btn btn-info editar" data-route="{{ route('admin.soporte.article.edit', $article->id) }}" id="{{$article->id}}" onclick="editarArticle(this.id);"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-success" data-route="{{ route('admin.soporte.article.edit', $article->id) }}" id="{{$article->id}}" onclick="showArticle(this.id);"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="{{ route('admin.soporte.delete.article', $article->id) }}"><i class="fa fa-trash"></i></a>
								</td>
                            </tr>
                        @endforeach
					</tbody>
                </table>
                @else
                <h3 class="white">No hay Artículos guardados...</h3>
                @endif
			</div>
		</div>
    </div>
    @include('admin.soporte.article_modal_new')
    @if(!$articles->isEmpty())
        @include('admin.soporte.article_modal_edit')
        @include('admin.soporte.article_modal_show')
    @endif
@endsection

