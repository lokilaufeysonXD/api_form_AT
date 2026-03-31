<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Routing\Controller;

class ClientesController extends Controller {
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    public function show($id)
    {
        $Clientes = Cliente::find($id);
        return response()->json($Clientes);
    }

    public function store(Request $request)
    {
        $clientes = new Cliente();
        $clientes->nombre_cliente = $request->input('nombre_cliente');
        $clientes->numero_cliente = $request->input('numero_cliente');
        $clientes->save();

        return response()->json($clientes ->toArray() + ['mensaje' => 'Cliente creado'],);
    }

    public function update(Request $request, $id)
    {
        $clientes = Cliente::find($id);
        if (!$clientes) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $clientes->nombre_cliente = $request->input('nombre_cliente', $clientes->nombre_cliente);
        $clientes->numero_cliente = $request->input('numero_cliente', $clientes->numero_cliente);
        $clientes->save();

        return response()->json($clientes ->toArray() + ['mensaje' => 'Cliente actualizado'],);
    }

    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        if (!$clientes) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $clientes->delete();

        return response()->json(['message' => 'Cliente eliminado']);
    }

}