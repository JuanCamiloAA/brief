<?php

namespace App\Http\Controllers;

use App\Http\Requests\formBrief;
use Illuminate\Http\Request;
use App\Models\BRIEF;
use App\Models\detalle_breif;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client;
use Alert;
use App\Imports\DatesImport;
use Maatwebsite\Excel\Excel;
use Symfony\Component\Console\Input\Input;

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

        foreach ($brief as $key => $value) {
            if ($value->VigFin <= date('Y-m-d')) {
                $state = $value->State;
                $id = $value->Brief;
                if ($state == 1) {
                    $camibio_auth = BRIEF::find($id);
                    $camibio_auth->update([
                        'State' => !$state
                    ]);
                }
            }
        }
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
        $retorno = Http::retry(20, 300)->withToken($_SESSION['B1SESSION'])
            ->get('https://10.170.20.95:50000/b1s/v1/$crossjoin(Items,BusinessPartners)?$expand=Items($select=ItemCode,ItemName,ForeignName,SupplierCatalogNo),BusinessPartners($select=CardCode,CardName)&$filter=Items/Mainsupplier eq BusinessPartners/CardCode');

        $retorno = $retorno->json();

        $articulos = $retorno['value'];

        $employes = Http::retry(20, 300)->withToken($_SESSION['B1SESSION'])
        ->get('https://10.170.20.95:50000/b1s/v1/SalesPersons?$select=SalesEmployeeCode,SalesEmployeeName');

        $employes = $employes->json();
        $empleados = $employes['value'];
        
        return view('pages.formBrief', compact('articulos', 'empleados'));
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
            $input = $request->all();
            // dd($input);
            DB::beginTransaction();
            $breif = BRIEF::create([
                "Solicitante" => $input["Solicitante"],
                "Solicitante_name" => $input["laboratorio_name"],
                "VigIni" => $input["VigIni"],
                "VigFin" => $input["VigFin"],
                "VigLiq" => $input["VigLiq"],
                "VigPag" => $input["VigPag"],
                "ObjGen" => $input["ObjGen"],
                "ObjEsp" => $input["ObjEsp"],
                "Cond" => $input["Cond"],
                "ForPagVe" => $input["ForPagVe"],
                "ForPagLab" => $input["ForPagLab"],
                "Pres" => $input["Pres"],
                "State" => 1
            ]);
            foreach ($input["vendedor_id"] as $key => $value) {
                detalle_breif::create([
                    "Titulo" => $input["titulo"][$key],
                    "Brief_id" => $breif->Brief,
                    "vendedor_id" => $input['vendedor_id'][$key],
                    "Meta" => $input["Meta"][$key],
                    "Ganancia" => $input["Ganancia"][$key],
                ]);
            }

            DB::commit();
            alert()->success('BRIEF', 'Brief creado exitosamente.');
            return Redirect()->route('brief.index');
        } catch (\Exception $e) {
            alert()->error('BRIEF', 'Brief NO fue creado.');
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

        $retorno = Http::retry(10, 300)->withToken($_SESSION['B1SESSION'])
        ->get('https://10.170.20.95:50000/b1s/v1/$crossjoin(Items,BusinessPartners)?$expand=Items($select=ItemCode,ItemName,ForeignName,SupplierCatalogNo),BusinessPartners($select=CardCode,CardName)&$filter=Items/Mainsupplier eq BusinessPartners/CardCode');
        
        $retorno = $retorno->json();
        $articulos = $retorno['value'];

        $employes = Http::retry(20, 300)->withToken($_SESSION['B1SESSION'])
        ->get('https://10.170.20.95:50000/b1s/v1/SalesPersons?$select=SalesEmployeeCode,SalesEmployeeName');

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
        $detalle_brief = detalle_breif::select("TABLE_BRIEF.*", "detalle_brief.*")->join("TABLE_BRIEF", "TABLE_BRIEF.Brief", "=", "detalle_brief.Brief_id")
            ->where("detalle_brief.Brief_id", $id)
            ->get();

        session_start();

        $retorno = Http::retry(10, 300)->withToken($_SESSION['B1SESSION'])
        ->get('https://10.170.20.95:50000/b1s/v1/$crossjoin(Items,BusinessPartners)?$expand=Items($select=ItemCode,ItemName,ForeignName,SupplierCatalogNo),BusinessPartners($select=CardCode,CardName)&$filter=Items/Mainsupplier eq BusinessPartners/CardCode');
        
        $retorno = $retorno->json();
        $articulos = $retorno['value'];

        $employes = Http::retry(20, 300)->withToken($_SESSION['B1SESSION'])
        ->get('https://10.170.20.95:50000/b1s/v1/SalesPersons?$select=SalesEmployeeCode,SalesEmployeeName');

        $employes = $employes->json();
        $empleados = $employes['value'];

        return view('pages.EditBrief', compact('brief', 'detalle_brief', 'articulos', 'empleados'));
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
        // dd($brief);
        $brief->update([
            "Conclucion" => $input['conclucion'],
        ]);
        
        alert()->success('BRIEF', 'Conclución Agregada exitosamente.');
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

    public function ChangeState($id, $State)
    {
        $brief = BRIEF::find($id);
        // dd($brief->VigFin);
        if ($brief->VigFin <= date('Y-m-d') && $brief->State == 0) {
            alert()->warning('Brief','No es posible el cambio de estado fecha de fin superada');
            return Redirect()->route('brief.index');
        }else{
            $brief->update([
                'State' => !$State
            ]);
            alert()->success('Brief','Cambio de estado exitoso');
            return Redirect()->route('brief.index');
        }
    }
}
