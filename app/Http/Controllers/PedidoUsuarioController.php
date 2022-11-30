<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('PedidoUsuario/index');
    }

    public function getProdutos($id)
    {
        if($id < 1){
            // Lembrar de declarar o use Illuminate\Support\Facades\DB;
            $produtos = DB::select("SELECT Produtos.*, Tipo_Produtos.descricao FROM Produtos 
                        JOIN Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
        } else {
            $produtos = DB::select("SELECT Produtos.*, Tipo_Produtos.descricao FROM Produtos 
                        JOIN Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                        WHERE Produtos.Tipo_Produtos_id = ?", [$id]);
        }
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $produtos;
        return response()->json($response, 200);
    }
}
