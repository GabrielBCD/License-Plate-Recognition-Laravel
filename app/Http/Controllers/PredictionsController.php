<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;
class PredictionsController extends Controller
{
    public function predictions()
    {
        $predicts = Predictions::paginate(8);


        return view('dashboard', ['predictions' => $predicts,
            'search_plate' => "",
            'search_type' => "",
            'search_start_date' => "",
            'search_end_date' => "",
            'search_vehicle' => ""]);
    }

    public function search(Request $request)
    {
        $search_plate = $request->input('search_plate');
        $search_type = $request->input('search_type');
        $search_start_date = $request->input('search_start_date');
        $search_end_date = $request->input('search_end_date');
        $search_vehicle = $request->input('search_vehicle');

        $query = Predictions::query();

        if ($search_start_date && $search_end_date) {
            if (strtotime($search_start_date) && strtotime($search_end_date)) {
                $query->whereBetween('date', [$search_start_date, $search_end_date]);
            } else {
                echo "Datas inválidas";
            }
        }

        if ($search_vehicle) {
            $query->where('vehicle', $search_vehicle);
        }

        if ($search_plate) {
            $query->where('plate', $search_plate);
        }

        if ($search_type) {
            $query->where('type', $search_type);
        }

        $predicts = $query->paginate(8);

        return view('dashboard', ['predictions' => $predicts,
            'search_plate' => $search_plate,
            'search_type' => $search_type,
            'search_start_date' => $search_start_date,
            'search_end_date' => $search_end_date,
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
