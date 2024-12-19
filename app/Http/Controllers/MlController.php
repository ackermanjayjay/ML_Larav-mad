<?php

namespace App\Http\Controllers;

use App\Models\Ml;
use App\Http\Requests\StoreMlRequest;
use App\Http\Requests\UpdateMlRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // requestt api from backend python
        return view("index");
    }

    public function calculationInput(Request  $request)
    {

        $response = Http::get("http://127.0.0.1:8000/prediction/", $request->all());
        $input = $response->json('result')['input'];
        $hasil = $response->json('result')['hasil'];
        return view("index",
        [
            "input" =>$input,
            "hasil"=> $hasil
        ]);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMlRequest $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Ml $ml)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ml $ml)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMlRequest $request, Ml $ml)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ml $ml)
    {
        //
    }
}
