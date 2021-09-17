<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Flight::where('is_active', '=', true);

        if ($request->Flight_type)
            $data->where('Flight_type_id', '=', $request->Flight_type);

        if ($request->no_paginate) 
            return collect([
                'status' => 0,
                'data' => $data->get(), ]);

        return collect([
            'status' => 0,
            'data' => $data->paginate(10), ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Flight::$rules);

        if ($validator->fails()) 
            return collect([
                'status' => 1, 
                'error' => true, 
                'message' => $validator->errors(), ]); 
        
        $Flight = Flight::create($request->all());

        if ($Flight->id) 
            return collect([
                'status' => 0,
                'message' => 'Tipo de avion creado exitosamente...',
                'item' => $Flight ]);
        else 
            return collect([
                'status' => 2,
                'message' => 'Tipo de avion no pudo ser creado...', ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $Flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $Flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $Flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $Flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $Flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $Flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $Flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $Flight)
    {
        //
    }
}
