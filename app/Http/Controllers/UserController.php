<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index() {
        return view('users', ['user' => User::all()]);
    }
    

    public function scan(Request $request) {
       $user = User::where('qr_code', $request->qr_code)->first();

        if ($user) {
            $kehadiran = Kehadiran::where('name', $user->name)->where('alamat', $user->alamat)->first();

            if ($kehadiran) {
                // Nama dan alamat sudah ada dalam tabel Kehadiran
                return response()->json(['kehadiran' => 'Data user sudah terdaftar di tabel Kehadiran'], 200);
        } else {
            Kehadiran::create([
                'name' => $user->name,
                'alamat' => $user->alamat
            ]);
        
            // QR code ditemukan di database dan entri baru ditambahkan ke tabel Kehadiran
            return response()->json(['berhasil' => 'QR code found in the database and new entry added to the Kehadiran table'], 200);
        }
        
        } else {
            // QR code tidak ditemukan di database
            return response()->json(['berhasil' => 'QR code not found in the database'], 404);
        }


    }

    public function kehadiran() {
        return view('kehadiran', ['kehadiran' => Kehadiran::orderByDesc('id')->get()]);
    }

    public function qrcode() {
        return view('qr-code');
    }

    public function undangan($nama) {
        $namaTamu = urldecode($nama);
        $qrCode = QrCode::size(200)->generate($namaTamu);

    return view('undangan', ['nama' => $namaTamu]);
    }
}
