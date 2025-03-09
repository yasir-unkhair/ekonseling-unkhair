<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CounselingRequests;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JadwalKonselingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $result = CounselingRequests::with('counselor')->user(auth()->user()->id)
                ->orderBy('created_at', 'DESC');
            return DataTables::of($result)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn = '<a href="javascript:void(0)" onclick="" class="badge badge-warning">Edit</a>';
                    $btn .= '&nbsp;<a href="javascript:void(0)" onclick="" class="badge badge-danger">Hapus</a>';
                    return $btn;
                })
                ->editColumn('konselor', function ($row) {
                    return ucwords($row->counselor->name ?? '-');
                })
                ->editColumn('tanggal', function ($row) {
                    $str = 'Tanggal: ' . tgl_indo($row->date, false);
                    $str .= '<br>Jam: ' . $row->time . ' WIT';
                    return $str;
                })
                ->editColumn('kategori', function ($row) {
                    return ucwords($row->category);
                })
                ->editColumn('details', function ($row) {
                    return '-';
                })
                ->editColumn('status', function ($row) {
                    return format_status_pengajuan($row->status);
                })
                ->rawColumns(['action', 'konselor', 'tanggal', 'metode', 'details', 'status'])
                ->make(true);
        }

        $data = [
            'title' => 'Jadwal Konseling',
            'datatable' => [
                'url' => route('user.jadwal_konseling.index'),
                'id_table' => 'id-datatable',
                'columns' => [
                    ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'konselor', 'name' => 'konselor', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'tanggal', 'name' => 'tanggal', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'kategori', 'name' => 'kategori', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'status', 'name' => 'status', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'details', 'name' => 'details', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'action', 'name' => 'action', 'orderable' => 'false', 'searchable' => 'false']
                ]
            ]
        ];
        return view('user.jadwal-index', $data);
    }
}
