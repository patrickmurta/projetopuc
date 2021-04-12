<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Unidade</th>
        <th class="text-center">Descrição</th>
        <th class="text-center">Peso</th>
        <th class="text-center">Fornecedor</th>
        <th class="text-center">Unidade</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($listRow as $list)
    <tr>
        <td>{{$list->nome}}</td>
        <td>{{$list->descricao}}</td>
        <td>{{$list->peso}}</td>
        <td>{{$list->fornecedor_id}}</td>
        <td>{{$list->unidade_id}}</td>
        <td><a href="{{url('produtos/edit/')}}/{{$list->id}}" class="btn btn-outline-info">Editar</a></td>
        <td><a href="{{url('produtos/destroy')}}/{{$list->id}}" class="btn btn-outline-danger">Excluir</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
