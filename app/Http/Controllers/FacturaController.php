<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    // Mostrar la lista de facturas
    public function index()
    {
        $facturas = Factura::with('cliente')->get(); // Incluir datos del cliente
        return view('facturas.index', compact('facturas'));
    }

    // Mostrar el formulario para crear una nueva factura
    public function create()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        return view('facturas.create', compact('clientes'));
    }

    // Guardar una nueva factura
    public function store(Request $request)
    {
        $request->validate([
            'numero_factura' => 'required|unique:facturas',
            'fecha_emision' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'monto_total' => 'required|numeric',
            'impuestos' => 'required|numeric',
            'estado' => 'required|in:pagado,pendiente,anulado'
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    // Mostrar el formulario para editar una factura
    public function edit(Factura $factura)
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        return view('facturas.edit', compact('factura', 'clientes'));
    }

    // Actualizar una factura existente
    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'numero_factura' => 'required|unique:facturas,numero_factura,' . $factura->id,
            'fecha_emision' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'monto_total' => 'required|numeric',
            'impuestos' => 'required|numeric',
            'estado' => 'required|in:pagado,pendiente,anulado'
        ]);

        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada exitosamente.');
    }

    // Eliminar una factura
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada exitosamente.');
    }
}
