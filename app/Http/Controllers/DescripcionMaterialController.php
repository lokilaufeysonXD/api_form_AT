<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescripcionMaterial;
use Illuminate\Routing\Controller;


class DescripcionMaterialController extends Controller {
    public function index()
    {
        $descripcionMaterial = DescripcionMaterial::all();

        return response()->json($descripcionMaterial);
    }

    public function show($id)
    {
        $descripcionMaterial = DescripcionMaterial::find($id);
        return response()->json($descripcionMaterial);
    }

    public function store(Request $request)
    {
        $descripcionMaterial = new DescripcionMaterial();
        $descripcionMaterial->descripcion_texto = $request->input('descripcion_texto');
        $descripcionMaterial->numero_orden_produccion = $request->input('numero_orden_produccion');
        $descripcionMaterial->save();

        return response()->json($descripcionMaterial ->toArray() + ['mensaje' => 'Descripcion Material creada'],);
    }

    public function update(Request $request, $id)
    {
        $descripcionMaterial = DescripcionMaterial::find($id);
        if (!$descripcionMaterial) {
            return response()->json(['message' => 'Descripcion Material no encontrado'], 404);
        }

        $descripcionMaterial->descripcion_texto = $request->input('descripcion_texto', $descripcionMaterial->descripcion_texto);
        $descripcionMaterial->numero_orden_produccion = $request->input('numero_orden_produccion', $descripcionMaterial->numero_orden_produccion);
        $descripcionMaterial->save();

        return response()->json($descripcionMaterial ->toArray() + ['mensaje' => 'Descripcion Material actualizado'],);
    }

    public function destroy($id)
    {
        $descripcionMaterial = DescripcionMaterial::find($id);
        if (!$descripcionMaterial) {
            return response()->json(['message' => 'Descripcion Material no encontrado'], 404);
        }

        $descripcionMaterial->delete();

        return response()->json(['message' => 'Descripcion Material eliminado']);
    }
}
