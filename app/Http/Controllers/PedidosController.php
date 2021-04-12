<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\PedidosProdutos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listDb = DB::table('pedidos_produtos')
            ->join('pedidos', 'pedidos_produtos.pedido_id','=', 'pedidos.id')
            ->join('fornecedores', 'pedidos_produtos.fornecedor_id', '=', 'fornecedores.id')
            ->join('produtos', 'pedidos_produtos.produto_id', '=', 'produtos.id')
            ->select('pedidos.codigo_pedido', 'pedidos.valor', 'produtos.nome as produto', 'fornecedores.nome as fornecedor', 'pedidos.id')
            ->get();

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
        //
        $title = 'Pedidos';

        $action = "/pedidos/store";

        $listFornecedores = DB::table('fornecedores')->get();
        $listProdutos = DB::table('produtos')->get();

        return view('pgform', ['titulo' => $title, 'action' => $action, 'listFornecedor' => $listFornecedores, 'listProdutos' => $listProdutos]);
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

        $title = 'Pedidos';

        $valor = rand(1, 100);
        $codigoPedido = 'COD-' . rand(1, 1000);
        // create a pedido
        $fornecedor = new Pedidos();
        $fornecedor->codigo_pedido = $codigoPedido;
        $fornecedor->valor = $valor;
        $fornecedor->save();
        // create a relational pedido/fornecedor/produto
        $pedidosProdutos = new PedidosProdutos();
        $pedidosProdutos->produto_id = $request->produto_id;
        $pedidosProdutos->fornecedor_id = $request->fornecedor_id;
        $pedidosProdutos->pedido_id = $fornecedor->id;
        $pedidosProdutos->save();
        //
        return redirect()->route('pedidos_create')->with('message', 'Pedido realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $pedidos, $id)
    {
        //
        $fornecedorGrid = DB::table('pedidos_produtos')->where('pedido_id', $id)->delete();
        $fornecedorGrid = DB::table('pedidos')->delete($id);
        return redirect()->route('pedidos')->with('message_delete', 'Unidade deletado');
    }

    public function genPdf()
    {
        $listRow = DB::table('pedidos_produtos')
            ->join('pedidos', 'pedidos_produtos.pedido_id','=', 'pedidos.id')
            ->join('fornecedores', 'pedidos_produtos.fornecedor_id', '=', 'fornecedores.id')
            ->join('produtos', 'pedidos_produtos.produto_id', '=', 'produtos.id')
            ->select('pedidos.codigo_pedido', 'pedidos.valor', 'produtos.nome as produto', 'fornecedores.nome as fornecedor', 'pedidos.id')
            ->get();
        // parts.grid.gridPedido Caso queira pegar apenas a lista de pedidos
        return \PDF::loadView('parts.grid.pedidosPdf ', compact('listRow'))
            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif'])
            ->download('lista_de_pedidos.pdf');
    }

    public function genGrafico()
    {
        $listData = DB::table('pedidos_produtos')
            ->join('produtos', 'produtos.id', '=', 'pedidos_produtos.produto_id')
            ->groupBy('produto_id')
            ->select( DB::raw('count(pedidos_produtos.produto_id) as qtd'), 'produtos.nome')
            ->get();

        foreach($listData as $data){
            $produto['nome'][] = $data->nome;
            $produto['qtd'][] = $data->qtd;
        }
        return view('pgRelatorio', ['label' => $produto['nome'], 'qtd' =>  $produto['qtd']]);
    }
}
