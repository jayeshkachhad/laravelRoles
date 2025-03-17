<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    function getProductDetails()
    {
        $products = product::all();
        return $products;
    }

    function login(Request $req)
    {
        $input = $req->all();
        $user = User::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return ["result" => "user not fount", "success" => false];
        } else {
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $user['name'] = $user->name;
            return ['success' => true, 'result' => $success, 'user' => $user['name']];
        }
        return $user;
    }
}
