@if(Session::has('message_delete'))
    <div class="alert alert-danger">
        {{Session::get('message_delete')}}
    </div>
@endif
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Valor</th>
        <th>Fornecedor</th>
        <th>Produto</th>
        <th width="20"></th>
    </tr>
    </thead>
    <tbody>
{{--    @dd($listRow)--}}
    @foreach( $listRow as $list )
    <tr>
        <td>{{ $list->codigo_pedido }}</td>
        <td>{{ $list->valor }}</td>
        <td> {{$list->fornecedor}} </td>
        <td> {{$list->produto}} </td>
        <td><a href="{{url('pedidos/destroy')}}/{{$list->id}}" class="btn btn-outline-danger">Excluir</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
