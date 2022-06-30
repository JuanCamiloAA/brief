@extends('welcome')

@section('tittle','Detalle BRIEF')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5 col-12 op_foot rounded">
        <div class="row">
            <div class="col text-center">
                <h2 class="coloresCorp">Detalle Brief.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-3">
                <h4><b>Solicitante:</b></h4>
                <span>
                    @if(isset($brief->Solicitante))
                    {{$brief->Solicitante_name}}
                    @else
                       <b class="text-danger opacity-75"> Sin solicitante.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>Fecha inicial:</b></h4>
                <span>
                    @if(isset($brief->VigIni))
                        {{$brief->VigIni}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de inicio.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>Fecha final:</b></h4>
                <span>
                    @if(isset($brief->VigFin))
                        {{$brief->VigFin}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de Fin.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>Fecha de pago:</b></h4>
                <span>
                    @if(isset($brief->VigPag))
                        {{$brief->VigPag}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de pago.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>Presupuesto:</b></h4>
                <span>
                    @if(isset($brief->Pres))
                        &#36;{{number_format($brief->Pres)}}
                    @else
                       <b class="text-danger opacity-75"> Sin presupuesto.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>forma de pago al vendedor:</b></h4>
                <span>
                    @if(isset($brief->ForPagVe))
                        {{$brief->ForPagVe}}
                    @else
                       <b class="text-danger opacity-75"> Sin forma de pago al vendedor.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>forma de pago del laboratorio:</b></h4>
                <span>
                    @if(isset($brief->ForPagLab))
                        {{$brief->ForPagLab}}
                    @else
                       <b class="text-danger opacity-75"> Sin forma de pago del laboratorio.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-12 p-3">
                <h4><b>Objetivo General:</b></h4>
                <span>
                    @if(isset($brief->ObjGen))
                        {{$brief->ObjGen}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivo General.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-12 p-3">
                <h4><b>Objetivos Especificos:</b></h4>
                <span>
                    
                    @if(isset($brief->ObjEsp))
                        {{$brief->ObjEsp}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivos especificos.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-12 p-3">
                <h4><b>Condiciones:</b></h4>
                <span>
                    @if(isset($brief->Cond))
                        {{$brief->Cond}}
                    @else
                       <b class="text-danger opacity-75"> Sin condiciones.</b>
                    @endif
                </span>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-3">
                <div class="col-8 col-md-2">
                    <a href="{{route('brief.index')}}" class="d-grid gap-2">
                    <button type="button" class="btn btn-outline-dark">Volver</button>
                    </a>
                </div>
            </div>
    </div>
    <div class="col-12 col-md-7 pt-3 pt-md-0">
        <div class="table-responsive">
            <table style="width: 100%;" class="table table-dark table-striped table-hover nowrap">
                <thead>
                    <tr> 
                        <th>Vendedor</th>
                        <th>Articulo</th>
                        <th>Laboratorio</th>
                        <th>Meta</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($detalle_brief as $detalle)
                            <tr>
                                
                                @foreach($empleados as $emp)
                                    @if($emp['SalesEmployeeCode'] == $detalle['vendedor_id'])
                                        <td>{{$emp['SalesEmployeeName']}}</td>
                                    @endif
                                @endforeach

                                <!-- <td>{{$detalle['vendedor_id']}}</td> -->

                                    @foreach($articulos as $arti)
                                        @if($arti['Items']['ItemCode'] == $detalle['articulo_id'])
                                            <td>{{$arti['Items']['ItemName']}}</td>
                                        @endif
                                    @endforeach
                                <td>{{$detalle['laboratorio_id']}}</td>
                                <td>&#36;{{number_format($detalle['Meta'])}}</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .coloresCorp{
        color: #0F6004;
        font-weight: 900;
    }
</style>
@endsection