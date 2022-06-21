@extends('welcome')

@section('content')
<div class="row justify-center mt-5">
    <div class="col-8">
        <div class="row bg-light rounded p-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="coloresCorp">Crear Brief.</h2>
                    </div>
                </div>
                <form action="{{route('login.store')}}" method="post">
                @csrf
                    <div class="row px-3">
                        <div class="form-floating h-0 mb-3 px-0">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Usuario</label>
                        </div>
                        <div class="form-floating h-0 mb-3 px-0">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <div class="col-12 py-2 text-center">
                            <!-- <a href="{{route('brief.index')}}" > -->
                                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                            <!-- </a> -->
                        </div>
                    </div>
                </form>
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
@endsection