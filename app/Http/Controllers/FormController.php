<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(FormRequest $request)
    {
        // All validation already handled by FormRequest automatically

        // You can access validated data like this (optional):
        // $validated = $request->validated();

        return response()->json([
            'status'  => 'success',
            'message' => 'Form submitted successfully!',
            'data'    => $request->validated() // optional for debugging
        ], 200);
    }
}
