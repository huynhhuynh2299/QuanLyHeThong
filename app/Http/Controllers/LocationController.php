<?php

namespace App\Http\Controllers;

use App\Models\QuanLyHuyen;
use App\Models\QuanLyXa;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function load(Request $request)
    {
        // $getById = ::where('HV_MASO', $id)->get();
        if ($request->tinh && $request->huyen) {
            $tinh = $request->tinh;
            $huyen = $request->huyen;
            $xa = QuanLyXa::where('TEN_TINH', $tinh)->where('TEN_HUYEN', $huyen)->get();

            return response()->json($xa, 200);
        }

        if ($request->tinh) {
            $tinh = $request->tinh;
            $huyen = QuanLyHuyen::where('TEN_TINH', $tinh)->get();

            return response()->json($huyen, 200);
        }
    }
}
