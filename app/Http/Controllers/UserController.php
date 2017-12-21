<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function verUtilizador($id) {
        $user = User::with(['carros.marca','carrinho_compras.marca','carrinho_compras.user'])->findOrFail($id);
        return view('perfil');
    }
    

    public function verAdmin() {
        return view('admin');
    }

    public function facebookLogin($access_token) {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://graph.facebook.com/v2.11/me?fields=id,name,email&format=json&access_token='.$access_token);

        if($res->getStatusCode() == 200) {

            $facebook_response = $res->getBody();
            $facebook_user = json_decode($facebook_response);
            $user = User::where('facebook_id', $facebook_user->id)
                ->orWhere('email', $facebook_user->email)
                ->first();

            if($user) {
                // Se o utilizador existir, atualizar dados
                $user->name = $facebook_user->name;
                $user->email = $facebook_user->email;
                $user->facebook_id = $facebook_user->id;
                $user->save();
            } else {
                // Se não existir, criar
                $user = User::create([
                    'name' => $facebook_user->name,
                    'email' => $facebook_user->email,
                    'facebook_id' => $facebook_user->id
                ]);
            }

            // Autenticar
            Auth::login($user);
            return redirect('/');

        } else abort(404);

    }

}

