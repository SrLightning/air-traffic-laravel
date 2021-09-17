<?php

namespace App\Http\Controllers;

use App\Models\FlightType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = FlightType::with([])->where('is_active', '=', true);

        if ($request->has('is_active')) 
            $data->where('is_active', '=', $request->is_active == 'true' ? true : false );
        

        if ($request->has('description')) 
            $data->where('description', 'like', '%'.$request->description.'%');
        

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
        $validator = Validator::make($request->all(), FlightType::$rules);

        if ($validator->fails()) 
            return collect([
                'status' => 1, 
                'error' => true, 
                'message' => $validator->errors(), ]); 
        
        $FlightType = FlightType::create($request->all());

        if ($FlightType->id) 
            return collect([
                'status' => 0,
                'message' => 'Tipo de avion creado exitosamente...',
                'item' => $FlightType ]);
        else 
            return collect([
                'status' => 2,
                'message' => 'Tipo de avion no pudo ser creado...', ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlightType  $FlightType
     * @return \Illuminate\Http\Response
     */
    public function show(FlightType $FlightType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlightType  $FlightType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightType $FlightType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlightType  $FlightType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightType $FlightType)
    {
        //
    }
}
