@extends('layouts.main')
@section('title', 'Crear producto')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> {{$errors->first()}}
        </div>
    @endif
    <form method="post" action="{{ route('product.store') }}">
        @csrf

        <div class="row form-group">
            <div class="col-md-6">
                <label for="name">Nombre de producto</label>
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="" value="{{old('name')}}">
            </div>
            <div class="col-md-6">
                <label for="reference">Referencia</label>
                <input type="text" class="form-control" name="reference"
                       id="reference" value="{{old('reference')}}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label for="price">Precio</label>
                <input type="number" class="form-control" name="price" id="price"
                       placeholder="" value="{{old('price')}}">
            </div>
            <div class="col-md-6">
                <label for="weight">Peso</label>
                <input type="number" class="form-control" name="weight"
                       id="weight" value="{{old('weight')}}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label for="category_id">Categoria</label>
                <select class="custom-select" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option name="category_id"
                                value="{{$category['category_id']}}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock"
                       id="stock" value="{{old('stock')}}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Crear</button>
        <a href="{{ route('product.index') }}" class="btn btn-warning">Cancelar</a>
    </form>

@endsection
