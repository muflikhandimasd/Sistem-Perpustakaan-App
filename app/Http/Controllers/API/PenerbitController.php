<?php

namespace App\Http\Controllers\API;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama_penerbit' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $penerbit = Penerbit::create($input);
        return response()->json([
            'status' => true,
            'data' => $penerbit
        ]);
    }
}
