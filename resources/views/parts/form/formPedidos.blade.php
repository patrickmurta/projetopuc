<form action="{{asset($action)}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="Código do pedido (automático)" disabled>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="Valor" disabled>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <select name="fornecedor_id" id="" class="form-control">
                <option value="">Indique o forncedor</option>
                @foreach($listFornecedor as $fornecedor)
                    <option value="{{$fornecedor->id}}" class="">{{$fornecedor->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <select name="produto_id" id="" class="form-control">
                <option value="">Indique o Produto</option>
                @foreach($listProdutos as $produtos)
                    <option value="{{$produtos->id}}" class="">{{$produtos->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Salvar</button>
    </div>
</form>
