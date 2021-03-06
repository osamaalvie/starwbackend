<?php

namespace App\Http\Controllers;

use App\Film;
use App\People;
use App\Planet;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byLongestCrawl()
    {
        $films = Film::query()
            ->select([
                DB::raw("CHAR_LENGTH(films.opening_crawl) AS opening_crawl"),
                "films.title",
                "films.director"
            ])
            ->orderByDesc("opening_crawl")
//            ->limit(1)
            ->get();


        return response()->json($films);
    }

    public function characterByMostAppearance()
    {
        /**
         * SELECT people.name, COUNT(films_characters.people_id) AS apearance
         * FROM people
         * JOIN films_characters ON people.id = films_characters.people_id
         * GROUP BY people.id
         * ORDER BY apearance desc
         */
        $films = People::query()
            ->select([
                "people.name",
            ])
            ->withCount('films')
            ->orderByDesc("films_count")
//            ->limit(1)
            ->get();


        return response()->json($films);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function speciesByMostAppearance()
    {
        $films = Species::query()
            ->select([
                "species.name",
            ])
            ->withCount('characters')
            ->orderByDesc("characters_count")
//            ->limit(1)
            ->get();


        return response()->json($films);
    }

    public function largestNoOfVehicle()
    {
        $planets = DB::select('SELECT 
pl.name AS planet, 
count(fc.people_id) AS no_of_pilots,
GROUP_CONCAT(p.name,"-",s.name) AS name

FROM planets pl

JOIN films_planets fp ON pl.id = fp.planet_id
JOIN films_characters fc ON fp.film_id = fc.film_id
JOIN people p ON fc.people_id = p.id
JOIN vehicles_pilots vp ON p.id = vp.people_id
JOIN species_people sp ON p.id = sp.people_id
JOIN species s ON sp.species_id = s.id

GROUP BY pl.id, fc.film_id
ORDER BY no_of_pilots DESC 
LIMIT 1');


        return response()->json($planets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
