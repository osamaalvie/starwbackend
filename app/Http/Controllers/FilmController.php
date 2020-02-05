<?php

namespace App\Http\Controllers;

use App\Film;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function speciesByMostAppearance()
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

    public function largestNoOfVehicle()
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
