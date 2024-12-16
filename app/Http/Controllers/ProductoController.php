<?php 

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductoController extends Controller
{
    // Método para mostrar todos los productos
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();

        // Retornar la vista con los productos
        return view('productos.index', compact('productos'));
    }

    // Método para mostrar la vista de creación de un producto
    public function create()
    {
        return view('productos.create');
    }

    // Método para almacenar un nuevo producto
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'codigo' => 'required|string|max:50', // Validar el campo código
        ]);

        // Crear un nuevo producto
        $producto = new Producto();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;

        // Manejar la imagen (si se sube)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('productos', 'public'); // Guardar en storage/app/public/productos
            $producto->image = $imagePath;
        }

        // Guardar el producto en la base de datos
        $producto->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Método para mostrar la vista de venta de un producto
    public function venta($id)
    {
        // Obtener el producto por su ID
        $producto = Producto::findOrFail($id);

        // Retornar la vista de venta con el producto
        return view('productos.venta', compact('producto'));
    }

    // Método para procesar la compra
    public function procesarCompra(Request $request, $id)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Redirigir al login si no está autenticado
            return redirect()->route('login');
        }
    
        // Validar los datos del formulario
        $request->validate([
            'tipo_tarjeta' => 'required|string|in:credito,debito',
            'numero_tarjeta' => 'required|string|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
            'fecha_expiracion' => 'required|date_format:Y-m',
            'cvv' => 'required|string|regex:/^\d{3}$/',
        ]);
    
        // Buscar el producto
        $producto = Producto::findOrFail($id);
    
        // Lógica simbólica de pago (aquí simulas la validación de la tarjeta)
        $tipoTarjeta = $request->input('tipo_tarjeta');
        $numeroTarjeta = $request->input('numero_tarjeta');
        $fechaExpiracion = $request->input('fecha_expiracion');
        $cvv = $request->input('cvv');
    
        
        // Ejemplo de respuesta según el tipo de tarjeta
        $mensaje = "Pago procesado exitosamente con tarjeta $tipoTarjeta.";
    
        // Redirigir con el mensaje de éxito
        return redirect()->route('productos.confirmacion')->with('success', $mensaje);
    }
    
    // Método para mostrar la vista de confirmación
    public function confirmacion()
    {
        // Verificar si hay un mensaje de éxito en la sesión
        $mensaje = session('success');

        // Retornar la vista de confirmación con el mensaje
        return view('productos.confirmacion', compact('mensaje'));
    }

//carritos

public function agregarAlCarrito($id)
{
    // Obtener el producto por su ID
    $producto = Producto::findOrFail($id);

    // Verificar si ya hay un carrito en la sesión
    $carrito = session()->get('carrito', []);

    // Verificar si el producto ya está en el carrito
    if (isset($carrito[$id])) {
        // Si ya está, aumentar la cantidad
        $carrito[$id]['cantidad']++;
    } else {
        // Si no está, agregarlo con cantidad 1
        $carrito[$id] = [
            'nombre' => $producto->name,
            'precio' => $producto->price,
            'cantidad' => 1,
            'imagen' => $producto->image,
        ];
    }

    // Guardar el carrito actualizado en la sesión
    session()->put('carrito', $carrito);

    return redirect()->route('productos.index')->with('success', 'Producto añadido al carrito');
}



}
