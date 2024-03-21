<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\alert;

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
            if ($search_start_date == $search_end_date) {
                $query->whereDate('date', $search_start_date);
            } else {
                if (strtotime($search_start_date) && strtotime($search_end_date)) {
                    $query->whereBetween('date', [$search_start_date, $search_end_date]);
                } else {
                    alert("Datas inválidas");
                }
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
        try {
            $prediction = Predictions::findOrFail($id);
            $user = Auth::user()->name;
            $old = $prediction->plate;
            $new = $request->input('plate');
            if ($old != $new){
                Log::channel('table_log')->info("User $user edited the table. Plate id: $id - Plate $old to $new.");
                $prediction->plate = $request->input('plate');
                $prediction->save();
            }
            return redirect()->back();
        } catch (\Exception $e) {
            log::channel('table_log')->error("User $user tried to change the plate id: $id and failed.");
            return redirect()->back();
        }
    }
}
