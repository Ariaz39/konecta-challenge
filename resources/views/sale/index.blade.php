@extends('layouts.main')
@section('title', 'Interfaz de venta')
@section('content')
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

@endsection

