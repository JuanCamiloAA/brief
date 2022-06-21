<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BRIEF;

class BriefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brief = BRIEF::all();
        return view('pages.brief', compact('brief'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.formBrief');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // $input=$request->all();
            BRIEF::create($request->all());
            
            return Redirect()->route('brief.index');
            
            // BRIEF::create([
            //     "Solicitante" => $input["Solicitante"],
            //     "Laboratorio" => $input["Laboratorio"],
            //     "CodArticulo" => $input["CodArticulo"],
            //     "ItemName" => $input["ItemName"],
            //     "SlpName" => $input["SlpName"],
            //     "VigIni" => $input["VigIni"],
            //     "VigFin" => $input["VigFin"],
            //     "VigPag" => $input["VigPag"],
            //     "ObjGen" => $input["ObjGen"],
            //     "ObjEsp" => $input["ObjEsp"],
            //     "Cond" => $input["Cond"],
            //     "ForPagVe" => $input["ForPagVe"],
            //     "ForPagLab" => $input["ForPagLab"],
            //     "Pres" => $input["Pres"],
            //     "Meta" => $input["Meta"], 
            // ]);
            // return Redirect()->route('brief.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
