<?php

namespace App\Http\Controllers\API;

use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RakController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'kode_rak' => 'required|string|max:6',
            'lokasi' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $rak = Rak::create($input);
        return response()->json([
            'status' => true,
            'data' => $rak
        ]);
    }
}
