<?php

namespace App\Http\Controllers;

use App\Models\Unidades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadesController extends Controller
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
        $listDb = DB::table('unidades')->get();
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
        $title = 'Fornecedores';

        $action = "/unidades/store";

        return view('pgform', ['titulo' => $title, 'action' => $action]);
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
        $title = 'Unidades';

        $fornecedor = new Unidades();
        $fornecedor->unidade = $request->unidade;
        $fornecedor->descricao = $request->descricao;
        $fornecedor->save();
        //
        return redirect()->route('unidade_create')->with('message', 'sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function show(Unidades $unidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidades $unidades, $id)
    {
        //

        $title = 'Fornecedores';
        $action = "/unidades/update";

        $dataRow = DB::table('unidades')->where('id', $id)->get();

        return view('pgform', ['titulo' => $title, 'dataRow' => $dataRow, 'action' => $action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidades $unidades)
    {
        //
        $idFornecedor = $request->id;
        //
        DB::table('unidades')->where('id', $idFornecedor)->update(
            [
                'unidade' => $request->unidade,
                'descricao' => $request->descricao,
            ]
        );
        //
        return redirect('/unidades/edit/'.$idFornecedor)->with('message', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidades $unidades, $id)
    {
        //
        $fornecedorGrid = DB::table('unidades')->delete($id);

        return redirect()->route('unidade')->with('message_delete', 'Unidade deletado');
    }
}
