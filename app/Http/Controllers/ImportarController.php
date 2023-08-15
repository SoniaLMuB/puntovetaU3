<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class ImportarController extends Controller
{
    //Funcion para retornar la vista de importar productos
    public function index()
    {
        return view('products.importProducts');
    }

    public function store(Request $request)
    {
        // Validar que el archivo esté presente
        $request->validate([
            'csv-file' => 'required|file|mimes:csv,txt' // Asegurarse de que sea un archivo CSV o TXT
        ]);

        // Leer el archivo
        $path = $request->file('csv-file')->getRealPath();
        $csvData = file_get_contents($path);

        // Convertir el CSV a un array
        $lines = explode("\n", $csvData);
        $arrayData = [];
        foreach ($lines as $line) {
            $arrayData[] = str_getcsv($line);
        }

        // Procesar los datos y guardar en la base de datos
        foreach ($arrayData as $data) {
            // Si no hay al menos 7 columnas, continuar con la siguiente línea
            if (count($data) < 7) {
                continue;
            }
            // Validar que la categoría y marca existen en la base de datos
            if (!empty($data[1]) && !empty($data[2]) && Categoria::find($data[1]) && Marca::find($data[2])) {
                Producto::create([
                    'nombre' => $data[0],
                    'categoria_id' => $data[1],
                    'marca_id' => $data[2],
                    'codigo' => $data[3],
                    'creado_por' => auth()->user()->username,
                    'stock' => $data[4],
                    'precio_venta' => $data[5],
                    'precio_compra' => $data[6]
                ]);
            } else {
                // Puedes registrar un log o enviar un mensaje si alguna de las relaciones no existe
                // Por ejemplo: Log::warning("No se encontró relación para el producto: " . $data[0]);
            }
        }

        // Redireccionar o enviar una respuesta
        return back()->with('success', 'Datos importados con éxito.');
        // O si hubo un error:
        // return back()->with('error', 'Hubo un error al importar los datos.');
    }
}