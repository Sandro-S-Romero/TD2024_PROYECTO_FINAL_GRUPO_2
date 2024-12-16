@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Producto al Carrito</h1>

        <form action="{{ route('carrito.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" class="form-control" id="producto_id">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="1">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Agregar al Carrito</button>
        </form>
    </div>
@endsection
