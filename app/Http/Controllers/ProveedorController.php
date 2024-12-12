<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        return Proveedor::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'rut' => 'nullable|string|max:10'
        ]);

        $proveedor = Proveedor::create($validated);
        $data = [
            'message' => 'Proveedor creado exitosamente',
            'Proveedor' => $proveedor
        ];

        return response()->json($data, 201);
    }


    public function show($id)
    {
        return Proveedor::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'category' => 'string|max:255',
            'address' => 'string|max:255',
            'website' => 'nullable|url',
            'rut' => 'string|max:20',
        ]);

        $proveedor->update($validated);
        return response()->json($proveedor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return response()->noContent(); // Retorna un 204
    }
}
