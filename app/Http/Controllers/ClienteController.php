<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    public function create()
    {
        return view('clientes.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes',
            'data_nascimento' => 'required|date',
            'sexo' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.form', compact('cliente'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $cliente = Cliente::where('id', $data['cliente_id'])->first();
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes,cpf,' . $cliente->id,
            'data_nascimento' => 'required|date',
            'sexo' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
        ]);

        $cliente->update($request->all());

        return true;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return true;
    }
}
