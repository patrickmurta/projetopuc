@if(Session::has('message_delete'))
    <div class="alert alert-danger">
        {{Session::get('message_delete')}}
    </div>
@endif
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>UF</th>
        <th>Site</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
{{--    @dd($listFornecedores)--}}
    @foreach( $listFornecedores as $fornecedores )
    <tr>
        <td>{{ $fornecedores->nome }}</td>
        <td>{{ $fornecedores->email }}</td>
        <td>{{ $fornecedores->uf }}</td>
        <td>{{ $fornecedores->site }}</td>
        <td><a href="{{url('fornecedores/edit/')}}/{{$fornecedores->id}}" class="btn btn-outline-info">Editar</a></td>
        <td><a href="{{url('fornecedores/destroy')}}/{{$fornecedores->id}}" class="btn btn-outline-danger">Excluir</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
