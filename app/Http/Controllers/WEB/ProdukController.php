<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function InsertProduk(ProdukRequest $request)
    {
$fileName = '';
        if ($request->gambar->getClientOriginalName()) {
            $file = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->gambar->storeAs('public/produk', $fileName); //direktori ada pada folder STORAGE/APP/PUBLIC/PRODUK
            // php artisan storage:link -> untuk bisa akses gambarnya
        }
 
        Produk::create(array_merge($request->all(), [
            'gambar' => $fileName
        ]));
        return redirect()->route('home');
    }
}