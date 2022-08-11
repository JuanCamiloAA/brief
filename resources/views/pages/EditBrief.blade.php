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
                <h4><b>Fecha de liquidación:</b></h4>
                <span>
                    @if(isset($brief->VigLiq))
                        {{$brief->VigLiq}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de liquidación.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-6 p-3">
                <h4><b>Fecha de pago:</b></h4>
                <span>
                    @if(isset($brief->VigLiq))
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
            <div class="col-md-12 p-3 text-lg-center">
                <h4><b>Objetivo General:</b></h4>
                <span>
                    @if(isset($brief->ObjGen))
                        {{$brief->ObjGen}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivo General.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-12 p-3 text-lg-center">
                <h4><b>Objetivos Especificos:</b></h4>
                <span>
                    
                    @if(isset($brief->ObjEsp))
                        {{$brief->ObjEsp}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivos especificos.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-12 p-3 text-lg-center">
                <h4><b>Condiciones:</b></h4>
                <span>
                    @if(isset($brief->Cond))
                        {{$brief->Cond}}
                    @else
                       <b class="text-danger opacity-75"> Sin condiciones.</b>
                    @endif
                </span>
            </div>
            
            <div class="col-md-12 p-3">
                <h4><b>Estado:</b></h4>
                <span>
                    @if($brief->State)
                        <div class="alert alert-success text-center" role="alert">
                            <b>Activo</b> 
                        </div>
                    @else
                        <div class="alert alert-danger text-center" role="alert">
                            <b>Inactivo</b> 
                        </div>
                    @endif
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7 pt-3 pt-md-0">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table style="width: 100%;" class="table table-dark table-striped table-hover nowrap">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Vendedor</th>
                                <th>Meta</th>
                                <th>Ganancia</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($detalle_brief as $detalle)
                                    <tr>
                                        <td>
                                            {{$detalle['id']}}
                                        </td>

                                        <td>
                                            {{$detalle['Titulo']}}
                                        </td>
                                        
                                        @foreach($empleados as $emp)
                                            @if($emp['SalesEmployeeCode'] == $detalle['vendedor_id'])
                                                <td>{{$emp['SalesEmployeeName']}}</td>
                                            @endif
                                        @endforeach

                                        <!-- <td>{{$detalle['vendedor_id']}}</td> -->
                                        <!-- @if($detalle['articulo_id'] == "General")
                                            <td>General</td>
                                        @else
                                            @foreach($articulos as $arti)
                                                @if($arti['Items']['ItemCode'] == $detalle['articulo_id'])
                                                    <td>{{$arti['Items']['ItemName']}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{{$detalle['laboratorio_id']}}</td> -->

                                        <td>&#36;{{number_format($detalle['Meta'])}}</td>
                                        <td>&#36;{{number_format($detalle['Ganancia'])}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(isset($brief->Conclucion))
            <div class="row mx-3 p-3 op_foot rounded">
                <div class="col-12 text-center">
                    <h2 class="coloresCorp">Concluciones.</h2>
                </div>
                <div class="col-12">
                    <form action="{{route('brief.update',$brief->Brief)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Concluciones" id="conclu" name="conclucion" style="height: 100px">{{$brief->Conclucion}}</textarea>
                                    <label for="floatingTextarea2">Conclución</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row d-flex justify-content-end my-3">
                            <div class="col-12 col-md-4 pb-3 pb-md-0 d-grid gap-2">
                                <button type="submit" class="btn btn-dark text-white">Guardar</button>
                            </div>
                            <div class="col-md-2 col-12">
                                <a href="{{route('brief.index')}}" class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-dark">Volver</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else 
            <div class="row mx-3 p-3 op_foot rounded">
                    <div class="col-12 text-center">
                        <h2 class="coloresCorp">Concluciones.</h2>
                    </div>
                    <div class="col-12">
                        <form action="{{route('brief.update',$brief->Brief)}}" method="post">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Concluciones" id="conclu" name="conclucion" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Conclución</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row d-flex justify-content-end my-3">
                                <div class="col-12 col-md-4 pb-3 pb-md-0 d-grid gap-2">
                                    <button type="submit" class="btn btn-dark text-white">Guardar</button>
                                </div>
                                <div class="col-md-2 col-12">
                                    <a href="{{route('brief.index')}}" class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-dark">Volver</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        @endif
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