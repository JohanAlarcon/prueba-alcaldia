<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleado::all();
        $departamentos = Departamento::where('estado', 'A')->get();
        return view(
            'empleado.index',
            compact('empleados', 'departamentos')
        );
    }


    public function store(Request $request)
    {


        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable',
            'departamento_id' => 'required|exists:departamentos,id'
        ]);

        try {

            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->email = $request->email;
            $empleado->telefono = $request->telefono;
            $empleado->departamento_id = $request->departamento_id;
            $empleado->save();

        } catch (\Throwable $e) {

            DB::rollback();

            return redirect()->route('empleado.index')->withErrors(['Error' => 'Error al registrar el empleado' . $e->getMessage()]);

        }

        return redirect()->route('empleado.index')->with('message', 'Empleado registrado con exito');
    }


    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $departamentos = Departamento::where('estado', 'A')->get();
        $empleados = Empleado::all();

        return view('empleado.index', compact('empleado', 'departamentos', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable',
            'departamento_id' => 'required|exists:departamentos,id'
        ]);

        try {

            $empleado = Empleado::find($id);
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->email = $request->email;
            $empleado->telefono = $request->telefono;
            $empleado->departamento_id = $request->departamento_id;
            $empleado->save();
            return redirect()->route('empleado.index')->with('message', 'Empleado actualizado con exito');

        } catch (\Throwable $e) {

            DB::rollback();

            return redirect()->route('empleado.index')->withErrors(['Error' => 'Error al actualizar el empleado' . $e->getMessage()]);

        }

    }

    public function destroy($id)
    {
        try {
            $empleado = Empleado::find($id);
            $empleado->delete();
            return redirect()->route('empleado.index')->with('message', 'Empleado eliminado con exito');
        } catch (\Throwable $e) {
            return redirect()->route('empleado.index')->withErrors(['Error' => 'Error al eliminar el empleado' . $e->getMessage()]);
        }
    }
}
