<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // Obtener todas las categorías
        $categorias = Categoria::all();

        // Retornar vista con las categorías
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        // Mostrar formulario para crear una nueva categoría
        return view('categoria.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre', // Validar nombre único de categoría
            'descripcion' => 'nullable|string', // Descripción opcional
        ]);

        // Crear la nueva categoría
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categoria.index')->with('success', 'Categoría creada con éxito');
    }

    /**
     * Display the specified category.
     */
    public function show($id)
    {
        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Retornar la vista con la categoría
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Retornar la vista con el formulario de edición
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id, // Validar nombre único de categoría
            'descripcion' => 'nullable|string', // Descripción opcional
        ]);

        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Actualizar los datos de la categoría
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada con éxito');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Eliminar la categoría
        $categoria->delete();

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada con éxito');
    }
}
