<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\VaccineCenter;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nid' => 'required|string|max:17',
            'phone_number' => 'required|string|max:15',
            'vaccine_center' => 'required|string|max:255',
        ]);

        // Log the validated request data
        Log::info('User Data Submitted:', $validatedData);

        // Retrieve vaccine center info
        $vaccine_center_info = VaccineCenter::where('center_name', $validatedData['vaccine_center'])->first();

        // Check if the vaccine center exists
        if (!$vaccine_center_info) {
            return response()->json(['message' => 'Vaccine center not found'], 404);
        }

        // Store user data
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'nid' => $validatedData['nid'],
            'phone_number' => $validatedData['phone_number'],
            'vaccine_center_id' => $vaccine_center_info->id,
        ]);

        // Return success response
        return response()->json(['message' => 'Data saved successfully']);
    }
}

