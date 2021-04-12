<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersGrid extends Controller
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

    //
    public function index()
    {
        $listDb = DB::table('users')->get();
        $tipoUsuario = DB::table('tipo_usuario')->get();

        return view('pggrid', ['listRow' => $listDb, 'listTipoUser' => $tipoUsuario]);
    }
    public function destroy(Unidades $unidades, $id)
    {
        //
        $fornecedorGrid = DB::table('users')->delete($id);

        return redirect()->route('users')->with('message_delete', 'Usuário Deletado!');
    }

}
