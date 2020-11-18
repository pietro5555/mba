<div class="col-md-12">
    <div class="box box-info" style="border-radius: 10px;">
        <div class="box-body">

<h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #005aff; color: white;">Anotaciones de los eventos
</h3>
@if(!$notes->isEmpty())
<table class="table" id="anotacionestabla">
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Nombre del Streaming</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
            <tr>
                    <td class="white" >{{$note->id}}</td>
                    <td class="white">{{$note->title}}</td>
                    <td class="white">{{$note->content}}</td>
            <td class="white">{{$note->streaming->title}}</td>
            </tr>
            @endforeach
        </tbody>
</table>
@else
<div class="col-md-12 m-3">
        <h3 class="white">Usted no posee notas asociadas</h3>
</div>

@endif
