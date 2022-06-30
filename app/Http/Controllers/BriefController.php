<?php

namespace App\Http\Controllers;

use App\Http\Requests\formBrief;
use Illuminate\Http\Request;
use App\Models\BRIEF;
use App\Models\detalle_breif;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client;
Use Alert;


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
        session_start();
        do {
            $retorno = Http::withToken($_SESSION['B1SESSION'])
            ->get('https://10.170.20.95:50000/b1s/v1/$crossjoin(Items,BusinessPartners)?$expand=Items($select=ItemCode,ItemName,ForeignName,SupplierCatalogNo),BusinessPartners($select=CardCode,CardName)&$filter=Items/Mainsupplier eq BusinessPartners/CardCode');
        } while ($retorno->clientError());
        $retorno = $retorno->json();
        
        $articulos = $retorno['value'];
        // dd($articulos);
        
        do {
            $employes = Http::withToken($_SESSION['B1SESSION'])
            ->get('https://10.170.20.95:50000/b1s/v1/SalesPersons?$select=SalesEmployeeCode,SalesEmployeeName');
        } while ($employes->clientError());
        $employes = $employes->json();
        $empleados = $employes['value'];
        // dd($empleados);
        return view('pages.formBrief',compact('articulos', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formBrief $request)
    {
        try {
            $input=$request->all();
            DB::beginTransaction();
            $breif = BRIEF::create([
                "Solicitante" => $input["Solicitante"],
                "Solicitante_name" => $input["laboratorio_name"],
                "VigIni" => $input["VigIni"],
                "VigFin" => $input["VigFin"],
                "VigPag" => $input["VigPag"],
                "ObjGen" => $input["ObjGen"],
                "ObjEsp" => $input["ObjEsp"],
                "Cond" => $input["Cond"],
                "ForPagVe" => $input["ForPagVe"],
                "ForPagLab" => $input["ForPagLab"],
                "Pres" => $input["Pres"],
            ]);
            foreach($input["vendedor_id"] as $key => $value){
                // dd($input["laboratorio"][$key]);
                detalle_breif::create([
                    "Brief_id" => $breif->Brief,
                    "vendedor_id" => $value,
                    "articulo_id"=>$input["articulo_id"][$key],
                    "laboratorio_id"=>$input["laboratorio"][$key],
                    "Meta"=>$input["Meta"][$key],
                ]);
            }
            DB::commit();
            alert()->success('BRIEF','BRIEF creado exitosamente.');
            return Redirect()->route('brief.index');
        } catch (\Exception $e) {
            alert()->error('BRIEF','BRIEF NO fue creado.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brief = BRIEF::find($id);
        $detalle_brief = detalle_breif::select("TABLE_BRIEF.*", "detalle_brief.*")->join("TABLE_BRIEF", "TABLE_BRIEF.Brief", "=", "detalle_brief.Brief_id")
        ->where("detalle_brief.Brief_id", $id)
        ->get();
        session_start();
        do {
            $retorno = Http::withToken($_SESSION['B1SESSION'])
            ->get('https://10.170.20.95:50000/b1s/v1/$crossjoin(Items,BusinessPartners)?$expand=Items($select=ItemCode,ItemName,ForeignName,SupplierCatalogNo),BusinessPartners($select=CardCode,CardName)&$filter=Items/Mainsupplier eq BusinessPartners/CardCode');
        } while ($retorno->clientError());
        $retorno = $retorno->json();
        $articulos = $retorno['value'];
        
        do {
            $employes = Http::withToken($_SESSION['B1SESSION'])
            ->get('https://10.170.20.95:50000/b1s/v1/SalesPersons?$select=SalesEmployeeCode,SalesEmployeeName');
        } while ($employes->clientError());
        $employes = $employes->json();
        $empleados = $employes['value'];

        return view('pages.detalleBrief', compact('brief', 'detalle_brief', 'articulos', 'empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brief = BRIEF::find($id);
        return view('pages.EditBrief', compact('brief'));
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
        $input = $request->all();
        $brief = BRIEF::find($id);
        $brief->update($input);
        return Redirect()->route('brief.index');
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
