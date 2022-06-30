@extends('welcome')

@section('tittle','Crear BRIEF')

@section('content')

<div class="row justify-content-center py-4">
    <div class="col-md-10 col-12 op rounded px-4">
        <div class="row">
            <div class="col text-center">
                <h1 class="coloresCorp">Crear Brief.</h1>
            </div>
        </div>
        <form action="{{route('brief.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-select selector  @error('Solicitante') is-invalid @enderror" style="width: 100%; height: 200px" name="Solicitante" id="solicitante" aria-label="Floating label select example">
                            <option value="" readonly disabled selected>Solicitante</option>
                            <option value="IvanAgro S.A" >IvanAgro S.A</option>
                                {{$labo = ''}}
                                @foreach($articulos as $lab)

                                    @if($labo != $lab['BusinessPartners']['CardName'])
                                        <option value="{{$lab['BusinessPartners']['CardCode']}}">{{$lab['BusinessPartners']['CardName']}}</option>
                                    @endif

                                    {{$labo = $lab['BusinessPartners']['CardName']}}
                                @endforeach
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
                        <input type="date" class="form-control @error('VigIni') is-invalid @enderror" name="VigIni" id="vig-ini" value="{{old('VigIni')}}" placeholder="name@example.com">
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
                        <input type="date" class="form-control @error('VigFin') is-invalid @enderror" name="VigFin" value="{{old('VigFin')}}" id="vig-fin" placeholder="name@example.com">
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
                        <input type="date" class="form-control @error('VigPag') is-invalid @enderror" name="VigPag" id="vig-pag" value="{{old('VigPag')}}" placeholder="name@example.com">
                        <label for="vig-pag">Fecha Pago <b style="color: red;">*</b>.</label>
                    </div>
                        @error('VigPag')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control  @error('Pres') is-invalid @enderror" name="Pres" id="pres" value="{{old('Pres')}}" placeholder="name@example.com">
                        <label for="pres">Presupuesto <b style="color: red;">*</b>.</label>
                    </div>
                        @error('Pres')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>                            
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="ObjGen" placeholder="Leave a comment here" id="obj-gen" style="height: 100px">{{old('ObjGen')}}</textarea>
                        <label for="obj-gen">Objetivo General.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="Cond" placeholder="Leave a comment here" id="cond" style="height: 100px">{{old('Cond')}}</textarea>
                        <label for="cond">Condiciones</label>
                    </div>
                </div>
                <div class="col-md-12 pb-5">
                    <div class="form-floating">
                        <textarea class="form-control mb-3" name="ObjEsp" placeholder="Leave a comment here" id="obj-esp" style="height: 100px">{{old('ObjEsp')}}</textarea>
                        <label for="obj-esp">Objetivos Especificos.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector" id="slp-name" aria-label="Floating label select example">
                            <option value="" readonly disabled selected>Vendedor</option>
                            @foreach ($empleados as $emp)
                            <option value="{{$emp['SalesEmployeeCode']}}">{{$emp['SalesEmployeeName']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select selector" id="cod-articulo" aria-label="Floating label select example">
                            <option value="" readonly disabled selected>Articulo</option>
                            @foreach($articulos as $arti)
                            <option value="{{$arti['Items']['ItemCode']}}" laboratorio_cod="{{$arti['BusinessPartners']['CardCode']}}" laboratorio_name="{{$arti['BusinessPartners']['CardName']}}" nombre="{{$arti['Items']['ItemName']}}"><i>{{$arti['Items']['ItemName']}}</i> <b>-[{{$arti['BusinessPartners']['CardName']}}]-</b></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="meta" placeholder="name@example.com">
                        <label for="meta">Meta.</label>
                    </div>
                </div>
                <div class="col-md-6 pb-3 pb-md-0">
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" style="height: 3.5rem;" onclick="agregar_esp()" type="button"><i class="fas fa-plus-circle text-white"></i>  Agregar</button>
                    </div>
                </div>
                <div class="col-md-12 cont_table mb-3">
                    
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table table-dark table-striped table-hover nowrap">
                            <thead>
                                <tr> 
                                    <th>Vendedor</th>
                                    <th>Articulo</th>
                                    <th>Laboratorio</th>
                                    <th>Meta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="table_brief_detalle">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select  mb-3" name="ForPagVe" id="for-pag-ve" aria-label="Floating label select example">
                            <option value="" readonly disabled selected>Forma de pago al vendedor</option>
                            <option value="Nomina">Nomina.</option>
                            <option value="Bono">Bono.</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select  mb-3" name="ForPagLab" id="for-pag-lab" aria-label="Floating label select example">
                            <option value="" readonly disabled selected>Forma de pago del laboratorio</option>
                            <option value="Nota credito">Nota Credito.</option>
                            <option value="Factura">Factura.</option>
                            <option value="Producto">Producto.</option>
                            <option value="Bono">Bono.</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end mb-5">
                <div class="col-12 col-md-4 pb-3 pb-md-0 d-grid gap-2">
                    <button type="submit" class="btn btn-dark text-white">Crear</button>
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
@endsection
@section('css')
<style>
    .coloresCorp{
        color: #0F6004;
        font-weight: 900;
        opacity: 0.7;
    }
    .op{
        background-color:  rgba(50, 49, 49 ,0.2);
    }
    .cont_table{
        min-height: 15rem;
        max-height: 15rem;
        overflow-y: hidden;
        overflow-y: auto;
    }
</style>
@endsection
@section('script')
<script>
    function agregar_esp() {
            let laboratorio_name = $("#solicitante option:selected").text();
            let vendedor_id = $("#slp-name option:selected").val();
            let articulo_id = $("#cod-articulo option:selected").val();
            let laboratorio = $("#cod-articulo option:selected").attr("laboratorio_cod");
            let meta = $("#meta").val();
            let vendedor_name = $("#slp-name option:selected").text();
            let articulo_name = $("#cod-articulo option:selected").attr('nombre');
            var formato = new Intl.NumberFormat('es-MX', {
                style: 'currency',
                currency: 'MXN',
            });
            if (vendedor_id != "" ) {
                if (meta != "") {
                    $("#table_brief_detalle").append(`
                        <tr id="tr-${vendedor_id}">
                                <input type="hidden" name="laboratorio_name" value="${laboratorio_name}"/>
                                <input type="hidden" name="vendedor_id[]" value="${vendedor_id}" />
                                <input type="hidden" name="articulo_id[]" value="${articulo_id}"/>
                                <input type="hidden" name="laboratorio[]" value="${laboratorio}"/>
                                <input type="hidden" name="Meta[]" value="${meta}"/>
                            <td>
                                ${vendedor_name}
                            </td>
                            <td>
                                ${articulo_name}
                            </td>
                            <td>
                                ${laboratorio_name}
                            </td>
                            <td>
                                ${formato.format(meta)}
                            </td>
                            <td class="text-center">
                                <button  type="button" class="btn btn-danger" onclick="eliminar(${vendedor_id})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar de la lista"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    `);
                } else {
                    Swal.fire({
                        title: '¡Atención!',
                        text: 'Ingrese una meta.',
                        icon: 'warning',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#212529',
                    })
                }
            } else {
                    Swal.fire({
                        title: '¡Atención!',
                        text: 'Seleccione un vendedor.',
                        icon: 'warning',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#212529',
                    })
            }
        }
        function eliminar(id) {
            let fila = $("#tr-"+id);
            fila.remove();
        }
</script>
@endsection