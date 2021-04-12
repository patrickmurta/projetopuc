<form action="{{asset($action)}}" method="post" enctype="multipart/form-data" class="">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        @csrf
        <div class="form-group col-md-6">
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="@if(isset($dataRow[0])){{$dataRow[0]->nome}}@endif">

            @if(isset($dataRow[0]->id))
                <input type="hidden" name="id" value="{{$dataRow[0]->id}}">
            @endif
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="peso" class="form-control" placeholder="Peso" value="@if(isset($dataRow[0])){{$dataRow[0]->peso}}@endif">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <select name="unidade_id" type="text" name="Unidade" class="form-control">
                <option value="">Escolha uma unidade</option>
                @foreach($listUnidade as $unidade)
                   @if(isset($dataRow[0]))
                    @php
                        $selected = ($unidade->id == $dataRow[0]->unidade_id) ? $selected = 'selected' : $selected = '';
                    @endphp
                    @endif
                    <option value="{{$unidade->id}}" @if(isset($dataRow[0])) {{$selected}} @endif>{{$unidade->unidade}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <select name="fornecedor_id" type="text" name="Unidade" class="form-control">
                <option value="">Escolha um fornecedor</option>
                @foreach($listFornecedor as $fornecedor)
                    @if(isset($dataRow[0]))
                    @php
                        $selected = ($fornecedor->id == $dataRow[0]->fornecedor_id) ? $selected = 'selected' : $selected = '';
                    @endphp
                    @endif
                    <option value="{{$fornecedor->id}}" @if(isset($dataRow[0])) {{$selected}} @endif>{{$fornecedor->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <textarea name="mensagem" id="" class="form-control" placeholder="Mensagem" rows="5"></textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-success">Salvar</button>
    </div>
</form>
