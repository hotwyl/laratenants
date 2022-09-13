<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Service\EventoService;
use Illuminate\Http\Request;


class EventoController extends Controller
{
    protected $eventoService;

    public function __construct(EventoService $eventoService)
    {
        $this->eventoService = $eventoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->eventoService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {
        return $this->eventoService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cod
     * @return \Illuminate\Http\Response
     */
    public function show($cod)
    {
        try {

            $produto = Product::whereCod($cod)->get();

            if($produto->toArray() == [] || empty($produto->toArray()) || in_array($produto->toArray(), ['', ' ', null, false])){
                return response()->json(['erro' => 'Nada Consta.'], 404);
            }

            return new EventoResource($produto);
            // return response()->json($produto,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cod)
    {
        try {

            $request->validate([
                'nome' => 'required',
                'slug' => 'nullable',
                'descricao' => 'nullable',
                'preco' => 'required',
                'status' => 'nullable',
            ]);

            $produto = Product::whereCod($cod)->first();

            if($produto->toArray() == [] || empty($produto->toArray()) || in_array($produto->toArray(), ['', ' ', null, false])){
                return response()->json(['erro' => 'Nada Consta.'], 404);
            }

            $validado = $request->all();

            $dados = [];

            if(isset($validado['nome'])){
                $dados['nome'] = $validado['nome'];
            }

            if(isset($validado['slug'])){
                $dados['slug'] = Str::slug($validado['slug'], '_');
            }

            if(isset($validado['descricao'])){
                $dados['descricao'] = $validado['descricao'];
            }

            if(isset($validado['preco'])){
                $dados['preco'] = floatval($validado['preco']);
            }

            if(isset($validado['status'])){
                $dados['status'] = intval($validado['status']);
            }

            $produto->update($dados);

            return new EventoResource($produto);
            // return response()->json($produto,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cod
     * @return \Illuminate\Http\Response
     */
    public function destroy($cod)
    {
        try {
            $produto = Product::whereCod($cod)->first();

            if($produto->toArray() == [] || empty($produto->toArray()) || in_array($produto->toArray(), ['', ' ', null, false])){
                return response()->json(['erro' => 'Nada Consta.'], 404);
            }

            $produto->delete();

            return new EventoResource($produto);
            //return response()->json($produto,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function search(Request $request)
    {
        try {

            $request->validate([
                'termo' => 'required',
            ]);

            $termo = $request->only('termo');

            $produto = Product::where('nome', 'like', '%'.$termo['termo'].'%')->paginate();

            return new EventoResource($produto);
            //return response()->json($produto,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }
}
