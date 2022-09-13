<?php

namespace App\Repository;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventoRepository
{

    public function buscarEventos()
    {
        try {


            return Event::where('tenant_id', Auth::user()->tenant_id)->where('status', true)->get();;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function salvarEvento($evento)
    {
        try {

            return Event::create($evento);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
