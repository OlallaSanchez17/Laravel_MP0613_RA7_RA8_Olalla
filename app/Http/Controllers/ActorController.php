<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public static function readActors(): array
    {
        $jsonFile = __DIR__ . '/actors.json';

        if (!file_exists($jsonFile)) {
            return [];
        }

        $actors = json_decode(file_get_contents($jsonFile), true);

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
