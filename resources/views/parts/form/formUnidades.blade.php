<form action="{{asset($action)}}" method="post" enctype="multipart/form-data" class="">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        @csrf
        <div class="form-group col-md-6">
            <input type="text" name="unidade" class="form-control" placeholder="Nome" value="@if(isset($dataRow[0])){{$dataRow[0]->unidade}}@endif">

            @if(isset($dataRow[0]->id))
                <input type="hidden" name="id" value="{{$dataRow[0]->id}}">
            @endif
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="@if(isset($dataRow[0])){{$dataRow[0]->descricao}}@endif">
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-success">Salvar</button>
    </div>
</form>
