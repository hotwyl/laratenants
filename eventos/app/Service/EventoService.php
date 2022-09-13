<?php

namespace App\Service;

use App\Http\Resources\AuthResource;
use App\Http\Resources\EventoCollection;
use App\Http\Resources\EventoResource;
use App\Models\Event;
use App\Models\User;
use App\Repository\AuthRepository;
use App\Repository\EventoRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventoService
{
    protected $eventoRepository;

    public function __construct(EventoRepository $eventoRepository)
    {
        $this->eventoRepository = $eventoRepository;
    }

    public function index(){
        try {

            $produtos = $this->eventoRepository->buscarEventos();

            return new EventoCollection($produtos);
            //return response()->json($produtos,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 401);
        }
    }

    public function store($request){
        try {

            $dados['cod'] = (string) Str::uuid();
            $dados['tenant_id'] = Auth::user()->tenant_id;

            if(isset($request['nome'])){
                $dados['nome'] = $request['nome'];
                $dados['slug'] = Str::slug($request['nome'], '_');
            }

            if(isset($request['descricao'])){
                $dados['descricao'] = $request['descricao'];
            }

            if(isset($request['schedule'])){
                $dados['schedule'] = date($request['schedule']);
            }

            if(isset($request['status'])){
                $dados['status'] = intval($request['status']);
            }

            $produto = $this->eventoRepository->salvarEvento($dados);

            return new EventoResource($produto);
            //return response()->json($produto,200);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 401);
        }
    }


}
