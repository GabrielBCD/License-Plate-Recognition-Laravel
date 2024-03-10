<?php

namespace App\Http\Controllers;

use App\Models\Predictions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $predictions = Predictions::all();
            return response()->json($predictions, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve predictions.'], 500);
        }
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
        try {
            $prediction = Predictions::create($request->all());
            return response()->json($prediction, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store prediction.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $prediction = Predictions::findOrFail($id);
            return response()->json($prediction, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Prediction not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve prediction.'], 500);
        }
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
