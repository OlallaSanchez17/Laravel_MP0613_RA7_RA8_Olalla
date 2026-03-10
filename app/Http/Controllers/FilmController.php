<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{

    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        if (is_null($year)) {
            $year = 2000;
        }
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = Film::where('year', '<', $year)->get();

        return view('films.list', ["films" => $films, "title" => $title]);
    }

    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        if (is_null($year)) {
            $year = 2000;
        }

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = Film::where('year', '>=', $year)->get();

        return view('films.list', ["films" => $films, "title" => $title]);
    }

    public function listAllFilms()
    {
        $title = "Listado de todas las películas";
        $films = Film::all();
  
        if ($films->isEmpty()) {
            $title = "No hay películas disponibles";
        }
 
        return view("films.list", [
            "films" => $films,
            "title" => $title
        ]);
    }

    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilmsByYear($year = null)
    {
        if (is_null($year)) {
            $title = "Listado de todas las películas (sin filtrar por año)";
            $films = Film::all();
        } else {
            $title = "Listado de películas del año $year";
            $films = Film::where('year', $year)->get();
        }

        return view("films.list", ["films" => $films, "title" => $title]);
    }

    public function listFilmsByGenre($genre = null)
    {
        if (is_null($genre)) {
            $title = "Listado de todas las películas (sin filtrar por género)";
            $films = Film::all();
        } else {
            $title = "Listado de películas del género $genre";
            $films = Film::where('genre', 'like', $genre)->get();
        }

        return view("films.list", ["films" => $films, "title" => $title]);
    }

    // contar pelis
    public function countFilms()
    {
        $count = Film::count();
        $title = "Total de películas";

        return view('films.count', [ 'count' => $count, 'title' => $title]);     
    }

    // peliculas por año
    public function sortFilms()
    {
        $films = Film::orderBy('year', 'desc')->get();
        $title = "Peliculas ordenadas";
        return view("films.list", ["films" => $films, "title" => $title]);
    }

    public function createFile(Request $request)
    {
        if ($request->isMethod('post')) {
            $year = (int)$request->year;

            if ($year < 1900 || $year > 2024) {
                \Log::error("Attempted to add film with invalid year: $year");
                return view('welcome', [
                    'error' => 'El año de la película debe estar entre 1900 y 2024'
                ]);
            }

            $exists = Film::where('name', $request->name)->exists();
            if ($exists) {
                return view('welcome', [
                    'error' => 'La película ya existe en la lista'
                ]);
            }

            Film::create([
                'name' => $request->name,
                'year' => $year,
                'genre' => $request->genre,
                'country' => $request->country,
                'duration' => $request->duration,
                'img_url' => $request->img_url,
            ]);

            return $this->listAllFilms();
        }
    }
}

