<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;

class ActorController extends Controller
{
    public static function readActors(): array
    {
        $actors = Actor::all()->toArray();

        return is_array($actors) ? $actors : [];
    }
    public function listAllActors()
    {
        $title = "Listado de todos los actores";
       
        $actors = ActorController::readActors();
 
        if (empty($actors)) {
            $title = "No hay actores disponibles";
            return view("actors.list", [
                "actors" => [],
                "title" => $title
            ]);
        }
 
        return view("actors.list", [
            "actors" => $actors,
            "title" => $title
        ]);
    }
}
