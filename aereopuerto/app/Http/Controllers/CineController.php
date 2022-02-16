<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCineRequest;
use App\Http\Requests\UpdateCineRequest;
use App\Models\Cine;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function show(Cine $cine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cine $cine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCineRequest  $request
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCineRequest $request, Cine $cine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cine $cine)
    {
        //
    }
}
