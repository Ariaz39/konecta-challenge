@extends('layouts.main')
@section('title', 'Listado de categorias')
@section('insert_button')
    <a href="{{ route('category.create') }}" class="btn btn-primary">Crear nueva</a>
@endsection
@section('content')

    @if(empty($categories))
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> No hay categorias disponibles
        </div>
    @else
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha creacion</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $item)
                <tr>
                    <th>{{ $item['category_id'] }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <a href="{{ route('category.edit', $item['category_id']) }}"
                           class="btn btn-sm btn-primary">Editar</a>
                        <form class="d-inline-block" action="{{ route('category.delete', $item['category_id']) }}"
                              method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

@endsection

