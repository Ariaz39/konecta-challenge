@extends('layouts.main')
@section('title', 'Listado de productos')
@section('insert_button')
    <a href="{{ route('product.create') }}" class="btn btn-primary">Crear nuevo</a>
@endsection
@section('content')
    @if(empty($products))
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> No hay productos disponibles
        </div>
    @else
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Referencia</th>
                <th>Precio</th>
                <th>Peso</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Fecha creacion</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <th>{{ $item['product_id'] }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['reference'] }}</td>
                    <td>$ {{ $item['price'] }}</td>
                    <td>{{ $item['weight'] }} grs</td>
                    <td>{{ $item['category']['name'] }}</td>
                    <td>{{ $item['stock'] }} uds</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <a href="{{ route('product.edit', $item['product_id']) }}"
                           class="btn btn-sm btn-primary">Editar</a>
                        <form class="d-inline-block" action="{{ route('product.delete', $item['product_id']) }}"
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

