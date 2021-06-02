<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[!$#%]).*$/|confirmed'],
                'usia' => ['required', 'string'],
                'kota' => ['required', 'string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[!$#%]).*$/|confirmed']
            ]);
            
            User::create([
                'name' => $request->name,
                'usia' => $request->usia,
                'kota' => $request->kota,
            ]);
        } catch (Exception $error) {
            return false;
        }
    }
}
