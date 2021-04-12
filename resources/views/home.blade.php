@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Produtos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary">Consultar Produtos Cadastrados no Sistema</button> <br />               

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gerencie os Fornecedores') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary">Consultar Fornecedores Cadastrados no Sistema</button> <br />

                </div>
            </div>
        </div>

         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gerencie os Clientes') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <button type="button" class="btn btn-primary">Consultar Clientes Cadastrados no Sistema</button><br />
                </div>
            </div>
        </div>
        <br /><br />
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gerencie os Pedidos') }}</div>

               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary">Consultar Pedidos Cadastrados no Sistema</button><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
