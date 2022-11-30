<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Endereco;

class EnderecoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            $enderecos = DB::select('SELECT * FROM Enderecos where Users_id = ?', [$logged->id]);
        } catch (\Throwable $th) {
            return view("Endereco/index")->with("enderecos", $enderecos)->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Endereco/index")->with("enderecos", $enderecos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($message) // $message = ["Mensagem", "danger"]
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            $enderecos = DB::select('SELECT * FROM Enderecos where Users_id = ?', [$logged->id]);
        } catch (\Throwable $th) {
            //throw $th;
            return view("Endereco/index")->with("enderecos", [])->with("message", $message);
        }
        return view("Endereco/index")->with("enderecos", $enderecos)->with("message", $message);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Endereco/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            $endereco = new Endereco();
            $endereco->Users_id = $logged->id;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "success"]);
        }
        return $this->indexMessage(["Endereço cadastrado com sucesso", "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            // Faz a consulta utilizando o DB::select
            $enderecos = DB::select("SELECT * FROM ENDERECOS WHERE id = ? and Users_id = ?", [$id, $logged->id]); // SEMPRE RETORNA UM ARRAY [ obj ] ou []
            // Verifica se o endereco de $id foi encontrado
            if( count($enderecos) > 0 ) {
                // Retorno quando dá certo
                return view("Endereco/show")->with("endereco", $enderecos[0]); // Retorna a posição 0, pois o array sempre terá 1 elemento
            }
            // Retorno quando falha no IF (Quando não encontra o ID pelo select)
            return $this->indexMessage(['O endereço não foi encontrado', 'warning']);    
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            // Procuro o endereco que eu quero editar
            $endereco = Endereco::where('id', $id)->where('Users_id', $logged->id)->first(); // Retorna um objeto ou null (quando não é encontrado)
            if( isset($endereco) ) {
                // Retorno quando dá certo
                return view("Endereco/edit")->with("endereco", $endereco);
            }
            // Retorno quando falha no IF (Quando não encontra o ID pelo find)
            return $this->indexMessage(['O endereco não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            // Procuro o endereco que eu quero editar
            $endereco = Endereco::where('id', $id)->where('Users_id', $logged->id)->first(); // Retorna um objeto ou null (quando não é encontrado)
            if( isset($endereco) ){
                //$endereco é do model
                //$request é do name na view
                $endereco->bairro = $request->bairro;
                $endereco->logradouro = $request->logradouro;
                $endereco->numero = $request->numero;
                $endereco->complemento = $request->complemento;
                $endereco->update();
                // Retorno quando dá certo
                return $this->indexMessage(['Endereço atualizado com sucesso', 'success']);
            }
            // Return quando não encontra o endereco para edição
            return $this->indexMessage(['O Endereço não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $logged = Auth::guard('web')->user(); // Retorna um objeto do Model User
            // Procuro o endereco que eu quero excluir
            $endereco = Endereco::where('id', $id)->where('Users_id', $logged->id)->first(); // Retorna um objeto ou null (quando não é encontrado)
            if( isset($endereco) ){
                // Remove o endereco
                $endereco->delete();
                // Retorno quando dá certo
                return $this->indexMessage(['Endereço removido com sucesso', 'success']);
            }
            // Retorno de aviso quando o endereco não foi encontrado
            return $this->indexMessage(['O endereco não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            // Retorno de erro
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }
}
