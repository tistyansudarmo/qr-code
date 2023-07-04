<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index() {
        return view('users', ['user' => User::all()]);
    }

    public function scan(Request $request) {
       $user =  User::where('qr_code', $request->qr_code)->first();

       if ($user) {
          // QR code ditemukan di database
          return response()->json(['berhasil' => 'QR code found in the database'], 200);
       } else {
          // QR code tidak ditemukan di database
          return response()->json(['berhasil' => 'QR code not found in the database'], 404);
    }

    }
}
