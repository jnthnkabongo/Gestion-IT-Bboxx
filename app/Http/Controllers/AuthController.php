<?php

namespace App\Http\Controllers;

use App\Http\Requests\credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Credentials $request)
    {
        $credentials = $request->validate();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('message', 'Bienvenu(e) dans notre page');
        }

        return to_route('redirect')->withErrors('Les informations saisies sont pas corrects')->onlyInput('email');
        /* $rules = [
            'email' => 'required|email|existe:users,email',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);


        //Pas trouver dans la base
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->route('dashboard')->with('succes', 'Vous êtes connecté');
        }*/
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
