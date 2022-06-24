@extends('welcome')

@section('tittle','Crear BRIEF')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 col-12 op rounded px-4">
        <div class="row">
            <div class="col text-center">
                <h1 class="coloresCorp">Crear Brief.</h1>
            </div>
        </div>
        <form action="{{route('brief.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector  @error('Solicitante') is-invalid @enderror" style="width: 100%; height: 200px" name="Solicitante" id="solicitante" aria-label="Floating label select example">
                            <option value="" readonly selected>Solicitante</option>
                            <option value="{{$retorno['CardName']}}">{{$retorno['CardName']}}</option>
                        </select>
                        @error('Solicitante')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector @error('Laboratorio') is-invalid @enderror" name="Laboratorio" id="laboratorio" aria-label="Floating label select example">
                            <option value="" readonly selected>Laboratotio</option>
                            <option value="Quimicos">Quimicos</option>
                            <option value="vete">vete</option>
                        </select>
                        @error('Laboratorio')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector @error('Laboratorio') is-invalid @enderror" name="SlpName" id="slp-name" aria-label="Floating label select example">
                            <option value="" readonly selected>Vendedor</option>
                            <option value="marta">marta</option>
                            <option value="pable">pable</option>
                            <option value="pepito">pepito</option>
                        </select>
                        @error('SlpName')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector" name="CodArticulo" id="cod-articulo" aria-label="Floating label select example">
                            <option value="" readonly selected>Articulo</option>
                            <option value="crema">crema</option>
                            <option value="pesticida">pesticida</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="ItemName" placeholder="Leave a comment here" id="item-name" style="height: 100px"></textarea>
                        <label for="item-name">Descripción Articulo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="ObjGen" placeholder="Leave a comment here" id="obj-gen" style="height: 100px"></textarea>
                        <label for="obj-gen">Objetivo General.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="ObjEsp" placeholder="Leave a comment here" id="obj-esp" style="height: 100px"></textarea>
                        <label for="obj-esp">Objetivos Especificos.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="Cond" placeholder="Leave a comment here" id="cond" style="height: 100px"></textarea>
                        <label for="cond">Condiciones</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control @error('VigIni') is-invalid @enderror" name="VigIni" id="vig-ini" placeholder="name@example.com">
                        <label for="vig-ini">Fecha Inicio <b style="color: red;">*</b>.</label>
                        @error('VigIni')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control @error('VigFin') is-invalid @enderror" name="VigFin" id="vig-fin" placeholder="name@example.com">
                        <label for="vig-fin">Fecha Fin <b style="color: red;">*</b>.</label>
                        @error('VigIni')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control @error('VigPag') is-invalid @enderror" name="VigPag" id="vig-pag" placeholder="name@example.com">
                        <label for="vig-pag">Fecha Pago <b style="color: red;">*</b>.</label>
                    </div>
                        @error('VigPag')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select  mb-3" name="ForPagVe" id="for-pag-ve" aria-label="Floating label select example">
                            <option value="" readonly selected>Forma de pago al vendedor</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Consignación">Consignación</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select  mb-3" name="ForPagLab" id="for-pag-lab" aria-label="Floating label select example">
                            <option value="" readonly selected>Forma de pago del laboratorio</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Consignación">Consignación</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="Pres" id="pres" placeholder="name@example.com">
                        <label for="pres">Presupuesto <b style="color: red;">*</b>.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="Meta" id="meta" placeholder="name@example.com">
                        <label for="meta">Meta <b style="color: red;">*</b>.</label>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="col-4 d-grid gap-2">
                    <button type="submit" class="btn btn-dark text-white">Crear</button>
                </div>
                <div class="col-2">
                    <a href="{{route('brief.index')}}" class="d-grid gap-2">
                    <button type="button" class="btn btn-outline-dark">Volver</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<style>
    .coloresCorp{
        color: #0F6004;
        font-weight: 900;
    }
    .op{
        background-color: rgba(252, 252, 252, 0.8);
    }
</style>
@endsection

@section('script')
<script>

</script>
@endsection