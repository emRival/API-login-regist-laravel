<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller {
    
public function regis(Request $request) {

$pesan = [
    'name.required' => 'Nama tidak boleh kosong',
    'email.required' => 'Email tidak boleh kosong',
    'email.email' => 'Email tidak valid',
    'email.unique' => 'Email sudah terdaftar',
    'telp.required' => 'No. Telp tidak boleh kosong',
    'telp.numeric' => 'No. Telp harus angka',
    'telp.max' => 'No. Telp maksimal 12 digit',
    'password.required' => 'Password tidak boleh kosong',
    'password.min' => 'Password minimal 6 karakter',
];

$validasi = Validator::make($request->all(), [
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
    'telp' => 'required|string|max:13',
    'password' => 'required|string|min:6',
], $pesan);

    if ($validasi->fails()) {
        $val = $validasi->errors()->all();
        return $this->pesanError($val[0]);
        }

   $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'telp' => $request->telp,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'status' => 1,
        'message' => 'Successfully created user!',
          'data' => $user
    ], 201);
}

public function pesanError($pesan) {
    return response()->json([
        'status' => 0,
        'message' => $pesan
    ]);
}

public function login (Request $request){

    $user = User::where('email', $request->email)->first();

    if($user){
        if(password_verify($request->password, $user->password)){
        return response()->json([
            'status' => 1,
        'message' => "Welcome, $user->name",
        'data' => $user
         ], Response::HTTP_OK);
        }
         return $this->pesanError("Kesalahan Input");
    } elseif ($request->email == null){
        return $this->pesanError("Email tidak boleh kosong");
    } elseif (isEmpty($user)) {
        return $this->pesanError("Aku Tidak Terdaftar :( ");
    }
    }
}