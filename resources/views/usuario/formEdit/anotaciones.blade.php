<div class="col-md-12" id="anotaciones_section">
    <div class="box" style="border-radius: 10px;">
        <div class="box-body">

<h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #005aff; color: white;">Mis notas de los eventos
</h3>
@if(!$notes->isEmpty())
<table  id="mytable" class="table" style="width: 100%!important;">
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Nombre del Streaming</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
            <tr>
                    <td class="text-center white" >{{$note->id}}</td>
                    <td class="text-center white">{{$note->title}}</td>
                    <td class="text-center white">{{$note->content}}</td>
                    <td class="text-center white">{{$note->streaming->title}}</td>
                    <td class="text-center white">
                       <!-- <a class="btn btn-success" data-titlevalue="{{$note->title}}" data-descriptionvalue="{{$note->content}}" data-toggle="modal" data-target="#modal-edit-note"><i class="fa fa-edit"></i></a>-->
                        <a href="javascript:void(0)" id="{{$note->id}}" data-route="{{ route('anotaciones.user.get', $note->id) }}" onclick="editNote(this.id)" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-success" id="{{$note->id}}" data-route="{{ route('anotaciones.user.get', $note->id) }}" onclick="showNote(this.id)"><i class="fa fa-eye"></i></a>
                    <a onclick="deleteNote({{$note->id}});" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
            </tr>
            @endforeach
        </tbody>
</table>
@else
<div class="col-md-12 m-3">
        <h3 class="white">Usted no posee notas asociadas</h3>
</div>

@endif
</div>
</div>
</div>
@if(!$notes->isEmpty())
    @include('usuario.formEdit.modal_anotaciones_edit')
    @include('usuario.formEdit.modal_anotaciones_show')
@endif
