<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class RecordAdminController extends Controller
{
    public function index()
    {
        $donations = Donation::with(['donationType', 'region'])
            ->orderBy('status', 'asc')  // Primero las pendientes (estado = 0) y luego las completadas (estado = 1)
            ->orderBy('date', 'desc')   // De la más reciente a la más antigua
            ->get();
        return view('admin.record', compact('donations'));
    }
    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        // Cambiar el estado basado en el valor enviado
        if ($request->has('status')) {
            $donation->status = $request->input('status');
            $donation->save();
        }

        return redirect()->back()->with('status', 'Estado de la donación actualizado.');
    }
}
