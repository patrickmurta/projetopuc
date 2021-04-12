<form action="{{asset($action)}}" method="post" enctype="multipart/form-data" class="">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        @csrf
        <div class="form-group col-md-6">
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="@if(isset($dataFornecedor[0])){{$dataFornecedor[0]->nome}}@endif">
        </div>
        @if(isset($dataFornecedor[0]->id))
            <input type="hidden" name="id" value="{{$dataFornecedor[0]->id}}">
        @endif
        <div class="form-group col-md-6">
            <input type="text" name="site" class="form-control" placeholder="Site" value="@if(isset($dataFornecedor[0])){{$dataFornecedor[0]->site}}@endif">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <input type="text" name="uf" class="form-control" placeholder="UF" value="@if(isset($dataFornecedor[0])){{$dataFornecedor[0]->uf}}@endif">
        </div>
        <div class="form-group col-md-4">
            <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="@if(isset($dataFornecedor[0])){{$dataFornecedor[0]->nome}}@endif">
        </div>
        <div class="form-group col-md-4">
            <input type="text" name="email" class="form-control" placeholder="Email" value="@if(isset($dataFornecedor[0])){{$dataFornecedor[0]->email}}@endif">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Salvar</button>
    </div>
</form>
