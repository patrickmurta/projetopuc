<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Nome</th>
        <th class="text-center">Email</th>
        <th class="text-center">Tipo de usuário</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($listRow as $list)
    <tr>
        <td>{{$list->name}}</td>
        <td>{{$list->email}}</td>
        <td>
            @foreach($listTipoUser as $tipo)
                @if($list->tipo_usuario_id == $tipo->id)
                    {{$tipo->descricao}}
                @endif
            @endforeach
        </td>
        <td><a href="{{url('users/edit/')}}/{{$list->id}}" class="btn btn-outline-info">Editar</a></td>
        <td><a href="{{url('users/destroy')}}/{{$list->id}}" class="btn btn-outline-danger">Excluir</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
