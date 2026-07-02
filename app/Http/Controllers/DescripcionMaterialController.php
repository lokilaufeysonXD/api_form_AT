<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescripcionMaterial;
use Illuminate\Routing\Controller;


class DescripcionMaterialController extends Controller {
    public function index()
    {
        $descripcionMaterial = DescripcionMaterial::with('actaEntrega')->get();

        $data = $descripcionMaterial->map(function ($item) {
            $array = $item->toArray();
            if (array_key_exists('acta_entrega', $array)) {
                $array['id_acta_entrega'] = $array['acta_entrega'];
                unset($array['acta_entrega']);
            }
            return $array;
        });

        return response()->json($data);
    }

    public function show($id)
    {
        $descripcionMaterial = DescripcionMaterial::with('actaEntrega')->find($id);
        if (!$descripcionMaterial) {
            return response()->json(['message' => 'Descripcion Material no encontrado'], 404);
        }
        $data = $descripcionMaterial->toArray();
        if (array_key_exists('acta_entrega', $data)) {
            $data['id_acta_entrega'] = $data['acta_entrega'];
            unset($data['acta_entrega']);
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $descripcionMaterial = new DescripcionMaterial();
        $descripcionMaterial->descripcion_texto = $request->input('descripcion_texto');
        $descripcionMaterial->numero_orden_produccion = $request->input('numero_orden_produccion');
        $descripcionMaterial->id_acta_entrega = $request->input('id_acta_entrega');
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
        $descripcionMaterial->id_acta_entrega = $request->input('id_acta_entrega', $descripcionMaterial->id_acta_entrega);
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
