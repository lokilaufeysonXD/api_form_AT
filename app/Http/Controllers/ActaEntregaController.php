<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActaEntrega;
use Illuminate\Routing\Controller;

class ActaEntregaController extends Controller
{
    public function index()
    {
        $actas = ActaEntrega::with('cliente', 'material')->get();

        return response()->json($actas);
    }

    public function show($id)
    {
        // $acta = ActaEntrega::find($id);
        $acta = ActaEntrega::with('cliente', 'material')->find($id);
        if (!$acta) {
            return response()->json(['message' => 'Acta de entrega no encontrada'], 404);
        }
        return response()->json($acta);
    }
        // revisar//


//     public function store(Request $request)
//     {
//         $acta = new ActaEntrega();
//         $acta->nombre_cliente = $request->input('nombre_cliente');
//         $acta->numero_cliente = $request->input('numero_cliente');
//         $acta->descripcion_material = $request->input('descripcion_material');
//         $acta->save();

//         return response()->json($acta ->toArray() + ['mensaje' => 'Acta de entrega creada'],);
//     }

//     public function update(Request $request, $id)
//     {
//         $acta = ActaEntrega::find($id);
//         if (!$acta) {
//             return response()->json(['message' => 'Acta de entrega no encontrada'], 404);
//         }

//         $acta->nombre_cliente = $request->input('nombre_cliente', $acta->nombre_cliente);
//         $acta->numero_cliente = $request->input('numero_cliente', $acta->numero_cliente);
//         $acta->descripcion_material = $request->input('descripcion_material', $acta->descripcion_material);
//         $acta->save();

//         return response()->json($acta ->toArray() + ['mensaje' => 'Acta de entrega actualizada'],);
//     }

//     public function destroy($id)
//     {
//         $acta = ActaEntrega::find($id);
//         if (!$acta) {
//             return response()->json(['message' => 'Acta de entrega no encontrada'], 404);
//         }

//         $acta->delete();

//         return response()->json(['message' => 'Acta de entrega eliminada']);
//     }
}
