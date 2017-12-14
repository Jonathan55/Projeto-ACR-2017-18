<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function verUtilizador($id) {
        $user = User::with(['carros.marca'])->findOrFail($id);
        return $user;
    }
}

