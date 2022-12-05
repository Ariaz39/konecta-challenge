@extends('layouts.main')
@section('title', 'Actualizar categoria')
@section('content')
    <form method="post" action="{{ route('category.update', $category->category_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de categoria</label>
            <input type="text" class="form-control" name="name" id="name"
                   placeholder="" value="{{ $category->name }}">
        </div>
        <ul>
            @foreach ($errors->get('name') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="form-group">
            <label for="description">Descripcion de categoria</label>
            <textarea class="form-control" name="description" id="description" cols="20"
                      rows="10">{{ $category->description }}</textarea>
        </div>
        <ul>
            @foreach ($errors->get('description') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="submit" class="btn btn-success">Crear</button>
    </form>

@endsection
