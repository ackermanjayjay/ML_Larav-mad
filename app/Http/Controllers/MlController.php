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
        $response = Http::get('http://127.0.0.1:8000/');
        dd($response);



    }
 
    public function calculationInput(Request  $request){
        $name1 = $request -> input('number1');
        $name2 = $request -> input('number2');
        $hasil = $name1 + $name2;
        
        return view('index', ['hasil' => $hasil]);


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
    public function store(StoreMlRequest $request)
    {

    }

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
