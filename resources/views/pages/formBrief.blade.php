@extends('welcome')

@section('tittle','Crear BRIEF')

@section('content')
    <div class="toast align-items-center text-white bg-dark border-0 fixed-bottom p-2 my-2 ml-2" id="alert" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
        <div class="d-flex">
            <div class="toast-body">
                    <strong id="icono"><i class="fas fa-info-circle text-info"></i> </strong><span id="mensaje"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>


    <div class="row justify-content-center py-4">
        <div class="col-md-10 col-12 op rounded px-4">
            <div class="row">
                <div class="col text-center py-3">
                    <h1 class="coloresCorp">Crear Brief.</h1>
                </div>
            </div>
            <form action="{{route('brief.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- <div class="col-md-12">
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
                    </div> -->
                    <div class="col-12">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="col-lg-3 col-md-4 col-5">
                                    <label class="input-group-text text-center" style="height: 3.5rem;" for="solicitante">Solicitante. <b style="font-size: 18px; color: red;">*</b></label>
                                </div>
                                <div class="col-lg-9 col-md-8 col-7">
                                    <select class="form-select select2  @error('Solicitante') is-invalid @enderror"  name="Solicitante" id="solicitante">
                                        <option value="">Solicitante.</option>
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
                                        <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('VigIni') is-invalid @enderror" name="VigIni" id="vig-ini" value="{{old('VigIni')}}" placeholder="name@example.com">
                            <label for="vig-ini">Fecha Inicio <b style="color: red;">*</b>.</label>
                            
                            @error('VigIni')
                                <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('VigFin') is-invalid @enderror" name="VigFin" value="{{old('VigFin')}}" id="vig-fin" placeholder="name@example.com">
                            <label for="vig-fin">Fecha Fin <b style="color: red;">*</b>.</label>
                            @error('VigFin')
                                <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('VigLiq') is-invalid @enderror" name="VigLiq" id="vig-liq" value="{{old('VigLiq')}}" placeholder="name@example.com">
                            <label for="vig-liq">Fecha Liquidación <b style="color: red;">*</b>.</label>
                            @error('VigLiq')
                                <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('VigPag') is-invalid @enderror" name="VigPag" id="vig-pag" value="{{old('VigPag')}}" placeholder="name@example.com">
                            <label for="vig-pag">Fecha Pago <b style="color: red;">*</b>.</label>
                            @error('VigPag')
                                <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control mb-3" name="ObjGen" placeholder="Leave a comment here" id="obj-gen" style="height: 100px">{{old('ObjGen')}}</textarea>
                            <label for="obj-gen">Objetivo General.</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control mb-3" name="ObjEsp" placeholder="Leave a comment here" id="obj-esp" style="height: 100px">{{old('ObjEsp')}}</textarea>
                            <label for="obj-esp">Objetivos Especificos.</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control mb-3" name="Cond" placeholder="Leave a comment here" id="cond" style="height: 100px">{{old('Cond')}}</textarea>
                            <label for="cond">Condiciones</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select  mb-3" name="ForPagVe" id="for-pag-ve" aria-label="Floating label select example">
                                <option value="" readonly disabled selected>Forma de pago al vendedor</option>
                                <option value="Nomina">Nomina.</option>
                                <option value="Bono">Bono.</option>
                            </select>
                            <label for="for-pag-ve">Forma de pago al vendedor <b style="color: red;">*</b>.</label>
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
                            <label for="for-pag-lab">Forma de pago del laboratorio <b style="color: red;">*</b>.</label>
                        </div>
                    </div>
                    <div class="col-md-6 pb-5">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control  @error('Pres') is-invalid @enderror" name="Pres" id="pres" value="{{old('Pres')}}" placeholder="name@example.com">
                            <label for="pres">Presupuesto <b style="color: red;">*</b>.</label>
                            @error('Pres')
                                <div class="alert alert-danger mt-1 mb-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <!-- <div class="col-lg-12 py-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="arch_excel">Cargar archivo Excel.</label>
                            <input type="file" class="form-control d-flex align-content-center" id="arch_excel" name="arch_excel" style="height: 3.5rem;" accept=".xlsx">
                        </div>
                    </div> -->
                    
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="titulo" placeholder="name@example.com">
                            <label for="titulo">Titulo.</label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="col-lg-3 col-md-4 col-5">
                                    <label class="input-group-text text-center" style="height: 3.5rem;" for="slp-name">Vendedor. </label>
                                </div>
                                <div class="col-lg-9 col-md-8 col-7">
                                    <select class="form-select select2" id="slp-name">
                                        <option value="" readonly disabled selected>Vendedor</option>
                                        @foreach ($empleados as $emp)
                                        <option value="{{$emp['SalesEmployeeCode']}}">{{$emp['SalesEmployeeName']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-lg-6">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="col-lg-3 col-md-4 col-5">
                                    <label class="input-group-text text-center" style="height: 3.5rem;" for="cod-articulo">Articulos. </label>
                                </div>
                                <div class="col-lg-9 col-md-8 col-7">
                                    <select class="form-select select2"  id="cod-articulo">
                                        <option value="" readonly selected>Articulo</option>
                                        @foreach($articulos as $arti)
                                        <option value="{{$arti['Items']['ItemCode']}}" laboratorio_cod="{{$arti['BusinessPartners']['CardCode']}}" 
                                        laboratorio_name="{{$arti['BusinessPartners']['CardName']}}" nombre="{{$arti['Items']['ItemName']}}">
                                        <i>{{$arti['Items']['ItemName']}}</i> <b>-[{{$arti['BusinessPartners']['CardName']}}]-</b></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="meta" placeholder="name@example.com">
                            <label for="meta">Meta.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="ganancia" placeholder="name@example.com">
                            <label for="ganancia">Ganancia.</label>
                        </div>
                    </div>
                    <div class="col-md-6 pb-3 pb-md-0">
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark" style="height: 3.5rem;" onclick="agregar_esp()" type="button"><i class="fas fa-plus-circle text-white"></i>  Agregar</button>
                        </div>
                    </div>
                    <div class="col-md-12 cont_table my-3">
                        
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-dark table-striped table-hover nowrap">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Vendedor</th>
                                        <th>Meta</th>
                                        <th>Ganancia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="table_brief_detalle">

                                </tbody>
                            </table>
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
        .select2{
            width: 100%!important;
            
        }
        .select2-container--bootstrap-5 .select2-selection{
            min-height:3.5rem!important;
        }
        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
            padding-top: 10px!important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-right: 0px!important;
        }
        .select2-container--bootstrap-5 .select2-selection--single{
            background-position: right 0.75rem center!important;
        }
    </style>
@endsection
@section('script')
    <script>
        

        let cont = 1;
        function agregar_esp() {
            let laboratorio_name = $("#solicitante option:selected").text();
            let titulo = $('#titulo').val();
            let vendedor_id = $("#slp-name option:selected").val();
            let vendedor_name = $("#slp-name option:selected").text();
            let meta = $("#meta").val();
            let ganancia = $("#ganancia").val();

            var formato = new Intl.NumberFormat('es-MX', {
                style: 'currency',
                currency: 'MXN',
            });
            if (vendedor_id != "" ) {
                if (meta != "") {
                    if (ganancia != "") {
                        $("#table_brief_detalle").append(`
                            <tr id="tr-${cont}">
                                    <input type="hidden" name="laboratorio_name" value="${laboratorio_name}"/>
                                    <input type="hidden" name="titulo[]" value="${titulo}" />
                                    <input type="hidden" name="vendedor_id[]" value="${vendedor_id}" />
                                    <input type="hidden" name="Meta[]" value="${meta}"/>
                                    <input type="hidden" name="Ganancia[]" value="${ganancia}"/>
                                <td>
                                    ${cont}
                                </td>
                                <td>
                                    ${titulo}
                                </td>
                                <td>
                                    ${vendedor_name}
                                </td>
                                <td>
                                    ${formato.format(meta)}
                                </td>
                                <td>
                                    ${formato.format(ganancia)}
                                </td>
                                <td class="text-center">
                                    <button  type="button" class="btn btn-danger" onclick="eliminar(${cont})" data-bs-toggle="tooltip" data-bs-placement="left" title="Eliminar de la lista"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        `);
                            $('#icono').text(``);
                            $('#icono').append(`<i class="fas fa-check-circle text-success"></i> `);
                            let mensaje = `Condición ${cont} agregada exitosamente.`;
                            $('#mensaje').text(mensaje);
                            $('#alert').toast('show');
                        cont += 1;
                    } else {
                        let mensaje = "Debe ingresar un valor en el campo Ganancia.";
                        $('#mensaje').text(mensaje);
                        $('#alert').toast('show');
                    }
                } else {
                    let mensaje = "Debe ingresar un valor en el campo Meta.";
                    $('#mensaje').text(mensaje);
                    $('#alert').toast('show');
                }
            } else {
                let mensaje = "Debe seleccionar un vendedor.";
                $('#mensaje').text(mensaje);
                $('#alert').toast('show');
            }
        }
        function eliminar(id) {
            let fila = $("#tr-"+id);
            fila.remove();
                $('#icono').text(``);
                $('#icono').append(`<i class="fas fa-check-circle text-success"></i> `);
                let mensaje = `Condición ${id} eliminada exitosamente.`;
                $('#mensaje').text(mensaje);
                $('#alert').toast('show');
        }
    </script>
@endsection