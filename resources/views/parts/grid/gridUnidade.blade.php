<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Cliente</th>
        <th class="text-center">Descricao</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($listRow as $list)
    <tr>
        <td>{{$list->unidade}}</td>
        <td>{{$list->descricao}}</td>
        <td><a href="{{url('unidades/edit/')}}/{{$list->id}}" class="btn btn-outline-info">Editar</a></td>
        <td><a href="{{url('unidades/destroy')}}/{{$list->id}}" class="btn btn-outline-danger">Excluir</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
