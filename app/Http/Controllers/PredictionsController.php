<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;
class PredictionsController extends Controller
{
    public function predictions()
    {
        $predicts = Predictions::paginate(10);

        return view('dashboard', ['predictions' => $predicts,
            'search_plate' => "",
            'search_type' => "",
            'search_date' => "",
            'search_vehicle' => ""]);
    }

    public function search(Request $request)
    {
        $search_plate = $request->input('search_plate');
        $search_type = $request->input('search_type');
        $search_date = $request->input('search_date');
        $search_vehicle = $request->input('search_vehicle');

        $query = Predictions::query();

        if ($search_vehicle) {
            $query->where('vehicle', $search_vehicle);
        }

        if ($search_plate) {
            $query->where('plate', $search_plate);
        }

        if ($search_type) {
            $query->where('type', $search_type);
        }

        if ($search_date) {
            $query->whereDate('date', $search_date);
        }

        $predicts = $query->paginate(10);

        return view('dashboard', ['predictions' => $predicts,
            'search_plate' => $search_plate,
            'search_type' => $search_type,
            'search_date' => $search_date,
            'search_vehicle' => $search_vehicle]);
    }

    public function update(Request $request, $id)
    {
        $prediction = Predictions::findOrFail($id);
        $prediction->plate = $request->input('plate');
        $prediction->save();
        return redirect()->back();
    }
}
