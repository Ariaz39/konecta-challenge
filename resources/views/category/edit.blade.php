@extends('layouts.main')
@section('title', 'Actualizar categoria')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger text-sm" role="alert">
            <strong>Error!</strong> {{$errors->first()}}
        </div>
    @endif

    <form method="post" action="{{ route('category.update', $category->category_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de categoria</label>
            <input type="text" class="form-control" name="name" id="name"
                   placeholder="" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <label for="description">Descripcion de categoria</label>
            <textarea class="form-control" name="description" id="description" cols="20"
                      rows="10">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('category.index') }}" class="btn btn-warning">Cancelar</a>
    </form>

@endsection
