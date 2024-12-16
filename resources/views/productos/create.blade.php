@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h2><i class="fas fa-plus-circle"></i> Crear Producto</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Campo Nombre -->
                            <div class="form-group mb-4">
                                <label for="name" class="font-weight-bold">Nombre del Producto</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}" required placeholder="Ingresa el nombre del producto">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Descripción -->
                            <div class="form-group mb-4">
                                <label for="description" class="font-weight-bold">Descripción</label>
                                <textarea class="form-control form-control-lg" id="description" name="description" rows="4" required placeholder="Describe el producto">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Precio -->
                            <div class="form-group mb-4">
                                <label for="price" class="font-weight-bold">Precio</label>
                                <input type="number" class="form-control form-control-lg" id="price" name="price" value="{{ old('price') }}" required placeholder="Ingresa el precio del producto">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Código -->
                            <div class="form-group mb-4">
                                <label for="codigo" class="font-weight-bold">Código</label>
                                <input type="text" class="form-control form-control-lg" id="codigo" name="codigo" value="{{ old('codigo') }}" required placeholder="Ingresa el código del producto">
                                @error('codigo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Imagen -->
                            <div class="form-group mb-4">
                                <label for="image" class="font-weight-bold">Imagen del Producto</label>
                                <input type="file" class="form-control form-control-lg" id="image" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-4 py-2">Guardar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script>
        // Aquí puedes agregar scripts personalizados si es necesario.
    </script>
@endpush
