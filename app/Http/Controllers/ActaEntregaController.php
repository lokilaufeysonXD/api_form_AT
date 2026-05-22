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
    public function store(Request $request)
    {
        $acta = new ActaEntrega();
        $acta->fecha_entrega = $request->filled('fecha_entrega') ? $request->input('fecha_entrega') : now()->toDateString();
        $acta->id_cliente = $request->input('id_cliente');
        $acta->numero_orden_compra = $request->input('numero_orden_compra');
        $acta->id_orden_produccion = $request->input('id_orden_produccion');
        $acta->save();

        return response()->json($acta->toArray() + ['mensaje' => 'Acta de entrega creada'], );
    }
        public function update(Request $request, $id)
    {
        $acta = ActaEntrega::find($id);
        if (!$acta) {
            return response()->json(['message' => 'Acta de entrega no encontrada'], 404);
        }

        // $acta->fecha_entrega = $request->input('fecha_entrega', $acta->fecha_entrega); 
        // el usuario no puede cambiar la fecha de entrega una ves ya puesta 

        $acta->id_cliente = $request->input('id_cliente', $acta->id_cliente);
        $acta->numero_orden_compra = $request->input('numero_orden_compra', $acta->numero_orden_compra);
        $acta->id_orden_produccion = $request->input('id_orden_produccion', $acta->id_orden_produccion);
        $acta->save();

            return response()->json($acta ->toArray() + ['mensaje' => 'Acta de entrega actualizada'],);
    }
    public function destroy($id)
    {
        $acta = ActaEntrega::find($id);
        if (!$acta) {
            return response()->json(['message' => 'Acta de entrega no encontrada'], 404);
        }

            $acta->delete();

            return response()->json(['message' => 'Acta de entrega eliminada']);
    }
}
