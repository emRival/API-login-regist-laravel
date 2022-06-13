<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukApiController extends Controller
{
    public function getProduk() {
        $produk = Produk::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 1,
            'message' => 'Successfully get data!',
            'data' => $produk
        ], 201);
    }
}