@extends('adminlte::page')

@section('title', 'Responsables')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Crear nuevo pedido</h2>
        </div>

    </div>

@endsection
@php
// listado de tipos
$array = ['Coordinador', 'Camillero', 'Emfermero', 'administracion', 'otros'];
@endphp

@section('content')

    <div class="container">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <div class="card">
            <div class="card-body">
                <form id="form" method="POST" action="{{route('clientes.create')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Responsable </label>
                                <input type="text" class="form-control" name="responsable"
                                    value="{{ Auth::user()->name }}" placeholder="" disabled>
                            </div>
                        </div>


                    <div class="col-sm-4">
                        <label for="">Ubicación </label>
                        <select id="departamento" name="departamento" class="form-control" required>
                            <option value="">Seleccioné una ubicación</option>
                            @foreach ($ubicacion as $ubi)
                                <option value="{{  $ubi->id }}" >
                                    {{ $ubi->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono </label>
                            <input type="text" class="form-control" name="registro"
                                value="" placeholder="Telefono" required>
                        </div>

                    </div>

                </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Pedido </label>
                            <select id="tipo" name="tipo" class="form-control" required>
                                <option value="">Seleccioné un tipo de elemento</option>
                                @foreach($compras as $compra)
                                    <option value="{{ $compra->elemento}}, {{ $compra->caracteristicas }}">{{ $compra->elemento}}, {{ $compra->caracteristicas }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cantidad </label>
                                <input type="number" min="1" class="form-control" name="cantidad"
                                    value="" placeholder="Cantidad" required>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Comentario </label>
                                <textarea class="form-control" name="direccion" id="form"
                                    rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary float-right">Agregar</button>
                    <a class="btn btn-danger float-left" href="{{ URL::previous() }}">Atras</a>

                </form>

            </div>
        </div>

    </div>
@endsection
