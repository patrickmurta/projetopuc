<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listDb = DB::table('produtos')->get();
        return view('pggrid', ['listRow' => $listDb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Produtos';

        $action = "/produtos/store";

        $listFornecedor = DB::table('fornecedores')->get();
        $listUnidades = DB::table('unidades')->get();

        return view('pgform', ['titulo' => $title, 'action' => $action, 'listFornecedor' => $listFornecedor, 'listUnidade' => $listUnidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $title = 'Unidades';

        $fornecedor = new Produtos();
        $fornecedor->nome = $request->nome;
        $fornecedor->peso = $request->peso;
        $fornecedor->unidade_id = $request->unidade_id;
        $fornecedor->fornecedor_id = $request->fornecedor_id;
        $fornecedor->descricao = $request->mensagem;
        $fornecedor->save();
        //
        return redirect()->route('produtos_create')->with('message', 'sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produtos, $id)
    {
        //
        $title = 'Fornecedores';
        $action = "/produtos/update";

        $dataRow = DB::table('produtos')->where('id', $id)->get();
        $listFornecedor = DB::table('fornecedores')->get();
        $listUnidades = DB::table('unidades')->get();

        return view('pgform',
            [
                'titulo' => $title,
                'dataRow' => $dataRow,
                'action' => $action,
                'listFornecedor' => $listFornecedor,
                'listUnidade' => $listUnidades
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produtos $produtos)
    {
        //
        //
        $idFornecedor = $request->id;
        //
        DB::table('produtos')->where('id', $idFornecedor)->update(
            [
                'nome' => $request->nome,
                'peso' => $request->peso,
                'unidade_id' => $request->unidade_id,
                'fornecedor_id' => $request->fornecedor_id,
                'descricao' => $request->mensagem,
            ]
        );

        //
        return redirect('/produtos/edit/'.$idFornecedor)->with('message', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produtos, $id)
    {
        //
        $fornecedorGrid = DB::table('produtos')->delete($id);

        return redirect()->route('produtos')->with('message_delete', 'Unidade deletado');
    }
}
