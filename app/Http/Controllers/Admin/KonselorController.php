<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class KonselorController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $result = User::with([
                'spesialisasi' => function (Builder $query) {
                    $query->orderBy('name', 'ASC');
                },
                'jadwal' => function (Builder $query) {
                    $query->orderBy(DB::raw('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")'), 'ASC')
                        ->orderBy('created_at', 'ASC');
                }
            ])->role(['counselor'])->orderBy('created_at', 'DESC');
            return DataTables::of($result)
                ->addIndexColumn()
                ->editColumn('nama_konselor', function ($row) {
                    $foto = foto_profil($row->foto);
                    $spesialisasi = '';
                    foreach ($row->spesialisasi as $sp) {
                        $spesialisasi .= '<span class="badge badge-warning mr-1">' . $sp->name . '</span>';
                    }

                    return '
                    <div class="d-inline-block align-middle">
                        <img src="' . $foto . '" alt="user image"
                            class="img-radius wid-40 align-top m-r-15">
                        <div class="d-inline-block">
                            <h6>' . $row->name . '</h6>
                            <p class="text-muted m-b-0">' . ($spesialisasi ?? '-') . '</p>
                        </div>
                    </div>
                    ';
                })
                ->editColumn('pengalaman', function ($row) {
                    $details = json_decode($row->details, true);
                    return ($details['pengalaman'] ?? '-') . ' tahun';
                })
                ->editColumn('jadwal', function ($row) {
                    $str = '';
                    foreach ($row->jadwal as $index => $row) {
                        $str .= ($index + 1) . '. ' . $row->hari . ': ' . $row->jam . '<br>';
                    }
                    return trim($str) ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return '
                    <a href="" class="btn btn-sm btn-success">Detail</a>
                    <a href="' . route('admin.konselor.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                    ';
                })
                ->rawColumns(['nama_konselor', 'pengalaman', 'jadwal', 'action'])
                ->make(true);
        }

        $data = [
            'title' => 'Daftar Konselor',
            'datatable' => [
                'url' => route('admin.konselor.index'),
                'id_table' => 'id-datatable',
                'columns' => [
                    ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'nama_konselor', 'name' => 'nama_konselor', 'orderable' => 'false', 'searchable' => 'true'],
                    ['data' => 'pengalaman', 'name' => 'pengalaman', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'jadwal', 'name' => 'jadwal', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'action', 'name' => 'action', 'orderable' => 'false', 'searchable' => 'false']
                ]
            ]
        ];
        return view('admin.konselor-index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Konselor'
        ];

        return view('admin.konselor-add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'counselor'
        ]);

        alert()->success('Success', 'Konsoler berhasil ditambahkan.');
        return redirect(route('admin.konselor.index'));
    }

    public function edit($id)
    {
        $get = User::where('id', $id)->first();
        $data = [
            'title' => 'Edit Konselor',
            'get' => $get
        ];

        return view('admin.konselor-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id
        ]);

        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username
        ];

        if (trim($request->password)) {
            $value += ['password' => Hash::make($request->password)];
        }

        User::where('id', $id)->update($value);

        alert()->success('Success', 'Konsoler berhasil diupdate.');
        return redirect(route('admin.konselor.index'));
    }
}
