@extends('adminlte::page')
@section('title', 'Responsables')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Lista de responsables</h2>
        </div>

    </div>


@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <a href="{{ route('clientes.create.vista') }}" class="btn btn-primary mt-4"><i
                        class="fas fa-plus-circle"></i> Añadir nuevo</a>

            </div>

            <div class="col-sm-2">
                <form method="GET" action="{{ route('clientes.lista') }}">
                    <label>Ordenar por:</label>
                    <select class="form-control" name="filtro">
                        <option value="1">Más recientes </option>
                        <option value="2">Tipos </option>
                        <option value="3">Estados </option>


                    </select>
            </div>
            <div class="col-sm-2" style="top: 0.4em">
                <button type="submit" class="btn btn-primary  mt-4"><i class="fas fa-search"></i> Buscar</button>

            </div>
            </form>

        </div>

    </div>
    @if (Auth::user()->rol == 'admin')
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <br>
        <div class="container">

            <table class="table table-striped table-res">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Responsable</th>
                        <th scope="col" style="background-color:#343a40; color:white;">Ubicación</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Pend.</th>
                        <th scope="col">Comentario</th>


                        @if (Auth::user()->rol == 'admin')
                            <th scope="col">Acción</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->responsable }}</td>
                            <td>{{ $cliente->ubicacion }}</td>
                            <td>{{ $cliente->registro }}</td>
                            @if ($cliente->entregado != 0)
                                <td>
                                    <span class="badge badge-pill badge-danger">Pendiente</span>
                                </td>
                            @else()
                                <td>
                                    <span class="badge badge-pill badge-success">Entregado</span>
                                </td>
                            @endif

                            <td>{{$cliente->tipo}}</td>
                            <td>{{$cliente->cantidad}}</td>
                            <td>{{$cliente->entregado}}</td>
                            <td style="max-width: 100px;
                            font-size: 16px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;">
                                {{ $cliente->direccion }}
                            </td>

                            @if (Auth::user()->rol == 'admin')
                                <td>
                                    <a href="{{ route('clientes.update.vista', $cliente->id) }}"
                                        class="btn btn-success mb-2"><i class="fas fa-eye"></i></a>

                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clientes->links() }}

        </div>
    @else
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <br>
        <div class="container">

            <table class="table table-striped table-res">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">pend.</th>
                        <th scope="col">ubicación</th>
                        <th scope="col">Comentario</th>


                        @if (Auth::user()->rol == 'admin')
                            <th scope="col">Acción</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            @if (Auth::user()->id == $cliente->responsable_id)
                                <th scope="row">{{ $cliente->id }}</th>
                                <td>{{ $cliente->responsable }}</td>
                                <td>{{ $cliente->cargo }}</td>
                                <td>{{ $cliente->registro }}</td>
                                @if ($cliente->entregado != 0)
                                    <td>
                                        <span class="badge badge-pill badge-danger">Pendiente</span>
                                    </td>
                                @else()
                                    <td>
                                        <span class="badge badge-pill badge-success">Entregado</span>
                                    </td>
                                @endif
                                <td>{{$cliente->tipo}}</td>
                                <td>{{$cliente->cantidad}}</td>
                                <td>{{$cliente->entregado}}</td>

                                <td>{{ $cliente->ubicacion }}</td>
                                <td style="max-width: 100px;
                            font-size: 16px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;">
                                    {{ $cliente->direccion }}
                                </td>

                                @if (Auth::user()->rol == 'admin')
                                    <td>
                                        <a href="{{ route('clientes.update.vista', $cliente->id) }}"
                                            class="btn btn-success mb-2"><i class="fas fa-edit"></i></a>

                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clientes->links() }}

        </div>
    @endif
    </div>
@endsection
