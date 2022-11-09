<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\TipoProduto;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web'); // Especificando qual guarda estamos utilizando
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $produtos = DB::select('SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id');
        } catch (\Throwable $th) {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Produto/index")->with("produtos", $produtos);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($message)
    {
        try {
            $produtos = DB::select('SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id');
        } catch (\Throwable $th) {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Produto/index")->with("produtos", $produtos)->with("message", $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $tipoProdutos = DB::select("SELECT * FROM Tipo_Produtos");
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
        return view("Produto/create")->with("tipoProdutos", $tipoProdutos);
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
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->save();
        } catch (\Throwable $th) {
            // Mensagem de erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
        //Mensagem de sucesso
        return $this->indexMessage( ["Produto cadastrado com sucesso", "success"] );
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
            $produtos = DB::select("SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Produtos.Tipo_Produtos_id,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                WHERE Produtos.id = ?", [$id]); // [obj], []
            // Derifica se encontrou o produto
            if(count($produtos) > 0) {
                // Retorno quando tudo está certo
                return view("Produto/show")->with("produto", $produtos[0]);
            }
            // Retorno de aviso, produto não encontrado
            return $this->indexMessage( ["Produto não encontrado", "warning"] );
        } catch (\Throwable $th) {
            // Retorno quando dá erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
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
            $produto = Produto::find($id); // retorna um obj ou null
            // Pergunto se o obj é válido ou null
            if( isset($produto) ){
                // Array com todos os TipoProdutos no BD
                $tipoProdutos = TipoProduto::all();
                // Retorno quando dá certo
                return view("Produto/edit")
                            ->with("produto", $produto)
                            ->with("tipoProdutos", $tipoProdutos);
            }
            // Retorno de aviso, produto não encontrado
            return $this->indexMessage( ["Produto não encontrado", "warning"] );
        } catch (\Throwable $th) {
            // Retorno quando dá erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
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
            //echo "Tipo $request->Tipo_Produtos_id";
            $produto = Produto::find($id); // retorna um obj ou null
            // Dentro dessa variável eu já tenho o produto que eu quero atualizar
    
            // Pergunto se o obj é válido ou null (se ele existe)
            if( isset($produto) ){
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes = $request->ingredientes;
                $produto->urlImage = $request->urlImage;
                $produto->update();
                // Recarregar a view index.
                // return \Redirect::route('produto.index');
                // Retorno quando dá certo
                return $this->indexMessage( ["Produto atualizado com sucesso", "success"] );
            }
            // Retorno de aviso, produto não encontrado
            return $this->indexMessage( ["Produto não encontrado", "warning"] );
        } catch (\Throwable $th) {
            // Retorno quando dá erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
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
            $produto = Produto::find($id); // Retorna o objeto encontrado ou null, caso ñ encontrado
            // Se o produto foi encontrado
            if( isset($produto) ) {
                $produto->delete();
                // return \Redirect::route('produto.index');
                // Retorno quando dá certo
                return $this->indexMessage( ["Produto removido com sucesso", "success"] );
            }
            // Retorno de aviso, produto não encontrado
            return $this->indexMessage( ["Produto não encontrado", "warning"] );
        } catch (\Throwable $th) {
            // Retorno quando dá erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
    }
}
