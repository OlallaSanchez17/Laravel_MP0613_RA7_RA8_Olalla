<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;

class ActorController extends Controller
{
    public static function readActors(): array
    {
        $actors = Actor::orderBy('birthdate', 'asc')->get()->toArray();

        return is_array($actors) ? $actors : [];
    }

    public static function getAvailableDecades(): array
    {
        $years = Actor::select('birthdate')->distinct()->orderBy('birthdate', 'asc')->pluck('birthdate')->toArray();
        $decades = [];
        foreach ($years as $y) {
            $decade = floor($y / 10) * 10;
            if (!in_array($decade, $decades)) {
                $decades[] = (int)$decade;
            }
        }
        return $decades;
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

    public function listActorsByDecade($year = null)
    {
        $decades = ActorController::getAvailableDecades();

        if (is_null($year)) {
            $title = "Listado de todos los actores (sin filtrar por década)";
            $actors = ActorController::readActors();
        } else {
            $endYear = $year + 9;
            $title = "Listado de actores nacidos en la década de $year a $endYear";
            $actors = Actor::whereBetween('birthdate', [$year, $endYear])->orderBy('birthdate', 'asc')->get()->toArray();
        }

        return view("actors.list", [
            "actors" => $actors, 
            "title" => $title, 
            "decades" => $decades,
            "selectedDecade" => $year
        ]);
    }
    public function countActors()
    {
        $actors = self::readActors(); 
        $count = count($actors);
        $title = "Total de actores";

        return view('actors.count', ['count' => $count, 'title' => $title]);     
    }
    
    public function deleteActor($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            return response()->json([
                "action" => "delete",
                "status" => false
            ]);
        }

        $actor->delete();

        return response()->json([
            "action" => "delete",
            "status" => true
        ]);
    }
}
