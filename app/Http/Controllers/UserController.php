<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Cambia los permisos del usuario
     * @param User $user
     * @return void
     */

    public function modify(User $user)
    {
        $message = "";
        $type = 'success';

        if ($user->hasRole('admin'))
        {
            if ($user->id != 1)
            {
                $user->removeRole('admin');
                $message = "Rol eliminado correctamente";

            } else
            {
                $message = "No se puede eliminar el permiso de este usuario";
                $type = "error";
            }

        } else
        {
            if ($user->email_verified_at != null)
            {
                $user->assignRole('admin');
                $message = "Rol agregado correctamente";

            } else
            {
                $message = "No se puede hacer administrador pues el usuario no ha verficado su correo";
                $type = "error";
            }
        }

        return redirect()->route('user.index')->with([
            'mensaje' => $message,
            'type' => $type,
            
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
