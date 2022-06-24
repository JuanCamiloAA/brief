@extends('welcome')

@section('tittle','Detalle BRIEF')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 col-12 op rounded p-4">
        <div class="row">
            <div class="col text-center">
                <h2 class="coloresCorp">Detalle Brief.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 p-3">
                <h4><b>Solicitante:</b></h4>
                <span>
                    @if(isset($brief->Solicitante))
                    {{$brief->Solicitante}}
                    @else
                       <b class="text-danger opacity-75"> Sin solicitante.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Laboratorio:</b></h4>
                <span>
                    @if(isset($brief->Laboratorio))
                    {{$brief->Laboratorio}}
                    @else
                    <b class="text-danger opacity-75"> Sin laboratorio.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Vendedor:</b></h4>
                <span>
                    
                    @if(isset($brief->SlpName))
                        {{$brief->SlpName}}
                    @else
                       <b class="text-danger opacity-75"> Sin vendedor.</b>
                    @endif
                    
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Codigo de articulo:</b></h4>
                <span>
                    @if(isset($brief->CodArticulo))
                    {{$brief->CodArticulo}}
                    @else
                    
                       <b class="text-danger opacity-75">Sin articulo.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Descripción de articulo:</b></h4>
                <span>
                    @if(isset($brief->ItemName))
                        {{$brief->ItemName}}
                    @else
                       <b class="text-danger opacity-75"> Sin descripción.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Objetivo General:</b></h4>
                <span>
                    @if(isset($brief->ObjGen))
                        {{$brief->ObjGen}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivo General.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Objetivos Especificos:</b></h4>
                <span>
                    
                    @if(isset($brief->ObjEsp))
                        {{$brief->ObjEsp}}
                    @else
                       <b class="text-danger opacity-75"> Sin objetivos especificos.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Condiciones:</b></h4>
                <span>
                    @if(isset($brief->Cond))
                        {{$brief->Cond}}
                    @else
                       <b class="text-danger opacity-75"> Sin condiciones.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Fecha inicial:</b></h4>
                <span>
                    @if(isset($brief->VigIni))
                        {{$brief->VigIni}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de inicio.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Fecha final:</b></h4>
                <span>
                    @if(isset($brief->VigFin))
                        {{$brief->VigFin}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de Fin.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Fecha de pago:</b></h4>
                <span>
                    @if(isset($brief->VigPag))
                        {{$brief->VigPag}}
                    @else
                       <b class="text-danger opacity-75"> Sin fecha de pago.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>forma de pago al vendedor:</b></h4>
                <span>
                    @if(isset($brief->ForPagVe))
                        {{$brief->ForPagVe}}
                    @else
                       <b class="text-danger opacity-75"> Sin forma de pago al vendedor.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>forma de pago del laboratorio:</b></h4>
                <span>
                    @if(isset($brief->ForPagLab))
                        {{$brief->ForPagLab}}
                    @else
                       <b class="text-danger opacity-75"> Sin forma de pago del laboratorio.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Presupuesto:</b></h4>
                <span>
                    @if(isset($brief->Pres))
                        {{$brief->Pres}}
                    @else
                       <b class="text-danger opacity-75"> Sin presupuesto.</b>
                    @endif
                </span>
            </div>
            <div class="col-md-4 p-3">
                <h4><b>Meta:</b></h4>
                <span>
                    @if(isset($brief->Meta))
                        {{$brief->Meta}}
                    @else
                       <b class="text-danger opacity-75"> Sin meta.</b>
                    @endif
                </span>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <a href="{{route('brief.index')}}" class="d-grid gap-2">
                    <button type="button" class="btn btn-outline-dark">Volver</button>
                    </a>
                </div>
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

@section('script')
<script>

</script>
@endsection