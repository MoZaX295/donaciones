<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('donations.signup');
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
        if ($request->isMethod('POST')) {
            $request->validate([
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'email' => 'required|email',
                'password' => 'required|max:32',
            ], [
                'first_name.required' => 'Proporciona tu(s) nombre(s).',
                'last_name.required' => 'Proporciona tu(s) apellido(s).',
                'email.max' => 'Email con máximo 50 caracteres.',
                'password.required' => 'Proporciona una contraseña.',
            ]);
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->user_type_id = 1;
            $user->save();
            Mail::to($user->email)->send(new UserMailable(
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('email'),
                $request->input('password')
            ));
            session(['user_email' => $request->input('email')]);
            return redirect()->route('donar.index')
                     ->with('success', 'BIENVENIDO
                     Se te envió un correo con tus datos, cuídalos.');
        }
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
    public function destroy(string $id)
    {
        //
    }
}
