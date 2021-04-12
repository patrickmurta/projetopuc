<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de pedidos</title>

    <!-- ideal seria criar um CSS especifico para print -->
    <link rel="stylesheet" href="">
</head>
<body>
<table border="1" width="100%" cellpadding="1" cellspacing="1" class="table-responsive table-bordered table-striped">
    <thead>
    <tr>
        <th>Código</th>
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
</body>
</html>
