<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationType;
use App\Models\Region;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('donations.donations');
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
                'donation_type' => 'required',
                'quantity' => 'required|max:100',
                'regions' => 'required',
            ], [
                'donation_type.required' => 'Selecciona un tipo de donación.',
                'quantity.required' => 'Proporciona la cantidad que deseas donar.',
                'regions.required' => 'Proporciona el lugar hacia donde quieres enviar tu donación.',
            ]);
            $email = session('user_email');
            $user = User::where('email', $email)->first();
            $donation = new Donation();
            $donation->status = 1;
            $donation->quantity = $request->input('quantity');
            $donation->date = now();
            $donation->description = " ";
            $donation->user_id = $user->id;
            $donation->donation_type_id = $request->input('donation_type');
            $donation->region_id = 1;
            $donation->save();
            $donation_type = DonationType::where('id', $donation->donation_type_id)->first();
            session(['donation_type' => $donation_type->donation_type, 'quantity' => $request->input('quantity')]);
            return redirect()->back()->with('success', 'Tu donación a sido guardada correctamente, GRACIAS POR TU APORTACIÓN');
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
