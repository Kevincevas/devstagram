<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        // attach: se usa en relaciones de muchos a muchos y pertenecen al mismo modelo o tabla
        $user->followers()->attach( auth()->user()->id );
        return back();
    }

    public function destroy(User $user)
    {
        // deattach: se usa en relaciones de muchos a muchos y pertenecen al mismo modelo o tabla
        $user->followers()->detach( auth()->user()->id );
        return back();
    }
}
