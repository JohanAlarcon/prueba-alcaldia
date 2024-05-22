<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::all();

        return view('departamento.index', compact('departamentos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        try {

            $departamento = new Departamento();
            $departamento->nombre = $request->nombre;
            $departamento->estado = $request->estado;
            
            $departamento->save();
            return redirect()->route('departamento.index')->with('message', 'Departamento registrado con exito');

        } catch (\Throwable $e) {
            return redirect()->route('departamento.index')->withErrors(['Error' => 'Error al registrar el departamento' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $departamentos = Departamento::all();

        return view('departamento.index', compact('departamento', 'departamentos'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required'
        ]);

        try {

            $departamento = Departamento::find($id);
            $departamento->nombre = $request->nombre;
            $departamento->estado = $request->estado;
            $departamento->save();
            return redirect()->route('departamento.index')->with('message', 'Departamento actualizado con exito');

        } catch (\Throwable $e) {
            return redirect()->route('departamento.index')->withErrors(['Error' => 'Error al actualizar el departamento' . $e->getMessage()]);
        }

    }


    public function destroy($id)
    {
        $departamento = Departamento::find($id);

        try {

            $departamento->delete();
            return redirect()->route('departamento.index')->with('message', 'Departamento eliminado con exito');

        } catch (\Exception $e) {
            return redirect()->route('departamento.index')->with('message', 'No se puede eliminar el departamento, tiene empleados asociados');
        }


    }
}
