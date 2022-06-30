@extends('welcome')

@section('tittle','BRIEF´S')

@section('content')

<div class="row mt-3">
    <div class="col-12">
        <a href="{{route('brief.create')}}">
            <button type="button" class="btn btn-primary" >
                <i class="fas fa-plus-circle mt-1"></i>
                 Crear BRIEF
            </button>
        </a>
    </div>
</div>
<div class="row op_foot rounded p-4 mt-3">
    <div class="col-12 mt-2">
        <div class="table-responsive">
            <table id="dt" style="width: 100%;" class="table table-dark table-striped table-hover nowrap">
                <thead>
                    <tr> 
                        <th>N° BRIEF</th>
                        <th>Solicitante</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Fecha Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brief as $brief)
                        <tr>
                            <td>{{$brief->Brief}}</td>
                        
                            <td>{{$brief->Solicitante_name}}</td>

                            <td>{{$brief->VigIni}}</td>
                            <td>{{$brief->VigFin}}</td>
                            <td>{{$brief->VigFin}}</td>
                            <td class="d-flex justify-content-around">
                            <!-- <a href="{{route('brief.edit', $brief->Brief)}}"><i class="text-warning far fa-edit"></i></a> -->
                            <a href="{{route('brief.show', $brief->Brief)}}"><i class="text-info fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    .dataTables_wrapper{
        color: #212529!important;
        font-weight: bold!important;
    }
    div.dataTables_wrapper div.dataTables_length label, div.dataTables_filter label {
        font-weight: bold!important;
    }
    div.dataTables_wrapper div.dataTables_length label select, div.dataTables_filter label input{
        color: white!important;
        background: #212529!important;
    }
    .paginate_button a{
        color: white !important;
        background-color: #212529!important;
    }
</style>
@endsection
@section('script')
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dt').DataTable(
            {
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            }
            );
        });
    </script>
@endsection