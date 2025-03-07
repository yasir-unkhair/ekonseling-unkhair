<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\CounselorHasSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KelengkapanController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Identitas Diri',
        ];

        return view('konselor.kelengkapan-identitas-diri', $data);
    }

    public function jadwal(Request $request)
    {
        if ($request->ajax()) {
            $result = CounselorHasSchedule::where('user_id', auth()->user()->id)
                ->orderBy(DB::raw('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")'))
                ->orderBy('created_at', 'ASC');
            return DataTables::of($result)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $onclick = "edit('" . $row->id . "')";
                    $onclick2 = "hapus('" . $row->id . "')";
                    $btn = '<a href="javascript:void(0)" onclick="' . $onclick . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btn .= '&nbsp;<a href="javascript:void(0)" onclick="' . $onclick2 . '" class="btn btn-danger btn-sm">Hapus</a>';
                    return $btn;
                })
                ->editColumn('metode', function ($row) {
                    return ucwords($row->metode);
                })
                ->editColumn('status', function ($row) {
                    return ($row->status) ? '<span class="badge badge-light-success">Aktif</span>' : '<span class="badge badge-light-danger">Tidak Aktif"></span>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $data = [
            'title' => 'Jadwal dan Ketersediaan',
            'datatable' => [
                'url' => route('counselor.kelengkapan.jadwal'),
                'id_table' => 'id-datatable',
                'columns' => [
                    ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'hari', 'name' => 'hari', 'orderable' => 'false', 'searchable' => 'true'],
                    ['data' => 'jam', 'name' => 'jam', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'metode', 'name' => 'metode', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'status', 'name' => 'status', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'action', 'name' => 'action', 'orderable' => 'false', 'searchable' => 'false']
                ]
            ]
        ];

        return view('konselor.kelengkapan-jadwal', $data);
    }
}
