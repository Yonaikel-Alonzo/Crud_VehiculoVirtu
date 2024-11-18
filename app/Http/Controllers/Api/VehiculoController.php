<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Obtener todos los vehículos
    public function index()
    {
        return response()->json(Vehiculo::all());
    }

    // Crear un nuevo vehículo
    public function store(Request $request)
    {
        $request->validate([
            'tipo_vehiculo' => 'required',
            'descripcion_vehiculo' => 'required',
            'categoria' => 'required',
            'fecha_creacion_matricula' => 'required|date',
            'fecha_caducidad_matricula' => 'required|date|after_or_equal:fecha_creacion_matricula',
        ]);

        $vehiculo = Vehiculo::create($request->all());
        return response()->json($vehiculo, 201);
    }

    // Obtener un vehículo específico
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        }

        return response()->json($vehiculo);
    }

    // Actualizar un vehículo
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        }

        $request->validate([
            'tipo_vehiculo' => 'required',
            'descripcion_vehiculo' => 'required',
            'categoria' => 'required',
            'fecha_creacion_matricula' => 'required|date',
            'fecha_caducidad_matricula' => 'required|date|after_or_equal:fecha_creacion_matricula',
        ]);

        $vehiculo->update($request->all());
        return response()->json($vehiculo);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        }

        $vehiculo->delete();
        return response()->json(['message' => 'Vehículo eliminado con éxito']);
    }
}
