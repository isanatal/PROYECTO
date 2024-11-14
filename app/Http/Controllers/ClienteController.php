<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10); 
        // Obtiene todos los clientes
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string',
        ]);

        // Crear un nuevo cliente
        Cliente::create($request->all());
        
        return redirect()->route('clientes.index');
        
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string',
            
        ]);

        // Actualizar el cliente
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
        
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        Alert::success('Éxito', 'El cliente ha sido eliminado correctamente')->flash();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}