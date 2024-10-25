<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('donations.login'); // Ruta de tu vista Blade de login
    }

    /**
     * Authenticate the user.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:32',
        ]);
         // Obtener el email del request
         $user_email = $request->input('email');

         // Buscar el usuario por correo electrónico
         $user = User::where('email', $user_email)->first();
 
         // Verificar si el usuario existe
         if ($user) {
            // Verificar la contraseña
            if ($request->input('password') === $user->password) { // Comparar la contraseña sin codificar
                // Almacenar el email en la sesión
                session(['user_email' => $user_email]);
    
                // Redirigir al controlador de donaciones
                return redirect()->route('donar.index')->with('success', 'Acceso exitoso.');
            } else {
                // La contraseña es incorrecta
                return redirect()->back()->withErrors(['password' => 'La contraseña es incorrecta.']);
            }
        } else {
            // El usuario no existe
            return redirect()->back()->withErrors(['email' => 'No se encontró un usuario con ese correo electrónico.']);
        }
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirigir a la página de login
    }
}
