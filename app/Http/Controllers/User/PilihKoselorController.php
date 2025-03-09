<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PilihKoselorController extends Controller
{
    public function index()
    {
        $konselor = User::with([
            'spesialisasi' => function (Builder $query) {
                $query->orderBy('name', 'ASC');
            },
            'jadwal' => function (Builder $query) {
                $query->orderBy(DB::raw('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")'), 'ASC')
                    ->orderBy('created_at', 'ASC');
            }
        ])->role(['counselor'])->where('is_active', 1)->get();
        // dd($konselor[0], $konselor[0]->spesialisasi, $konselor[0]->jadwal);
        $data = [
            'konselor' => $konselor,
            'title' => 'Daftar Konselor'
        ];
        return view('user.pilih-konselor', $data);
    }
}
