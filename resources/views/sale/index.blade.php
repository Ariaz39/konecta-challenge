@extends('layouts.main')
@section('title', 'Interfaz de venta')
@section('content')

    @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{Session::get('error_message')}}
        </div>
    @elseif(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{Session::get('success_message')}}
        </div>
    @endif

    @if(empty($products))
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> No hay productos disponibles
        </div>
    @else
        <form method="post" action="{{ route('sale.sell') }}">
            @csrf

            <div class="row form-group">
                <div class="col-md-6">
                    <label for="product_id">Producto</label>
                    <select class="custom-select" name="product_id" id="product_id">
                        @foreach($products as $product)
                            <option name="product"
                                    value="{{$product['product_id']}}">{{ $product['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="amount">Cantidad</label>
                    <input type="number" class="form-control" name="amount"
                           id="amount">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Vender</button>
            <a href="{{ route('sale.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    @endif

    @if(empty($sales))
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> No hay registros de venta disponibles
        </div>
    @else
        <table class="table table-hover table-striped mt-5">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Fecha de venta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $item)
                <tr>
                    <td>{{ $item['sale_id'] }}</td>
                    <td>{{ $item['product']['name'] }}</td>
                    <td>{{ $item['amount'] }} uds</td>
                    <td>{{ $item['created_at'] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

@endsection

