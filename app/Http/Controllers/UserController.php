<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        return view('user.index', compact('user'));
    }



    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'imagen' => 'mimes:jpg,png',
        ]);

        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]);

        $user->name = $request->name;
        $user->email = $request->email;
        $pass = $request->get('password');

        if ($pass != null) {

            $user->password = bcrypt($request->get('password'));

        } else {

            unset($user->password);

        }

        if ($request->hasFile('imagen')) {

            $file = $request->imagen;

            $path = public_path() . '/img/usuarios';

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $file->getClientOriginalName());
            $user->imagen = $file->getClientOriginalName();

        }

        try {

            $user->save();

        } catch (\Throwable $e) {

            DB::rollback();

            return redirect()->route('user.index')->withErrors(['Error' => 'Error al actualizar el usuario' . $e->getMessage()]);

        }

        return redirect()->route('user.index')->with('message', 'Perfil actualizado con exito');
    }

}
