<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Marca;

class UserController extends Controller
{

    public function verUtilizador($id) {
        $user = User::with(['carros.marca','carrinho_compras.marca','carrinho_compras.user'])->findOrFail($id);
        return $user;
    }

    public function verAdmin() {
        $marcas = Marca::all();
        $users = User::all();

        return view('admin', compact('marcas', 'users'));
    }


    public function eliminarMarca(Request $request)
    {
        $user = Auth::user();
        $marca = Marca::findOrFail($request->marca);


        if($user->admin)
        {
            $marca->delete();
            return back();
        }else
        {
            return abort(404);
        }

    }

    public function adicionarMarca(Request $request)
    {
        $user = Auth::user();
        $marca = Marca::where('marca', $request->marca)->first();

        if($user->admin && $marca == null)
        {
            $marca = new Marca;
            $marca->marca = $request->marca;
            $marca->save();
            return back();
        }else
        {
            return abort(404);
        }

    }

    public function eliminarUser(Request $request)
    {
        $user = Auth::user();
        $userToDelete = User::findOrFail($request->utilizador);

        if($user->admin)
        {
            $carros = $userToDelete->carros;
            foreach($carros as $carro)
            {
                $carro->delete();
            }
            
            

            $userToDelete->delete();

            return back();
        }else
        {
            return abort(404);
        }
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

