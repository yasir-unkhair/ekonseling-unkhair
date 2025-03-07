<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('frontend.beranda', $data);
    }

    public function konselor()
    {
        try {
            $konselor = User::with([
                'spesialisasi' => function ($q) {
                    $q->orderBy('name', 'ASC');
                },
                'jadwal' => function ($q) {
                    $q->orderBy(DB::raw('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")'), 'ASC')
                        ->orderBy('created_at', 'ASC');
                }
            ])->role(['counselor'])->get();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            exit();
        }

        $data = [
            'title' => 'Konselor',
            'counselors' => $konselor
        ];
        return view('frontend.konselor', $data);
    }

    public function aktivasi_akun($params)
    {
        $params = decode_arr($params);
        if (!$params) {
            abort(404);
        }

        $id = $params['id'];
        $email = $params['email'];

        try {
            $register = RegisterUser::where('id', $id)->first();

            if (!$register) {
                abort(404);
            }

            if ($register->is_active == 1) {
                abort(404);
            }

            // update status aktivasi
            $register->update([
                'is_active' => 1
            ]);

            User::create([
                'name' => $register->nama,
                'email' => $register->email,
                'username' => NULL,
                'password' => Hash::make($register->password),
                'role' => 'user',
                'is_active' => 1
            ]);

            alert()->success('Success', 'Akun berhasil diaktivasi!');
            return redirect(route('frontend.beranda'));
        } catch (\Throwable $th) {
            echo $th->getMessage();
            exit();
        }
    }
}
