<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;
class PredictionsController extends Controller
{
    public function predictions(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $plate = $request->input('search_plate');
        $type = $request->input('search_type');
        $date = $request->input('search_date');
        $vehicle = $request->input('search_vehicle');

        $query = Predictions::query();

        if ($vehicle) {
            $query->where('vehicle', $vehicle);
        }

        if ($plate) {
            $query->where('plate', $plate);
        }

        if ($type) {
            $query->where('type', $type);
        }

        if ($date) {
            $query->whereDate('date', $date);
        }

        $predicts = $query->get();

        return view('predictions', ['predictions' => $predicts,
        'search_plate' => $plate,
        'search_type' => $type,
        'search_date' => $date,
        'search_vehicle' => $vehicle]);
    }
}
