<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\CounselingRequests;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Str;

class PermintaanKonselingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $result = CounselingRequests::with('user')->counselor(auth()->user()->id)
                ->orderBy('created_at', 'DESC');
            return DataTables::of($result)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $detail = "detail('" . $row->id . "');";
                    $btn = '
                        <button type="button" onclick="' . $detail . '" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Details</button>
                    ';
                    return $btn;
                })
                ->editColumn('konseli', function ($row) {
                    return ucwords($row->user->name ?? '-');
                })
                ->editColumn('kategori', function ($row) {
                    return ucwords($row->category);
                })
                ->editColumn('tanggal', function ($row) {
                    $str = 'Tanggal: ' . tgl_indo($row->date, false);
                    $str .= '<br>Jam: ' . $row->time . ' WIT';
                    return $str;
                })
                ->editColumn('deskripsi', function ($row) {
                    return Str::limit($row->description, 45, '...') ?? '-';
                })
                ->editColumn('status', function ($row) {
                    return format_status_pengajuan($row->status);
                })
                ->rawColumns(['action', 'konseli', 'tanggal', 'metode', 'deskripsi', 'status'])
                ->make(true);
        }

        $data = [
            'title' => 'Permintaan Konseling',
            'datatable' => [
                'url' => route('counselor.permintaan_konseling.index'),
                'id_table' => 'id-datatable',
                'columns' => [
                    ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'konseli', 'name' => 'konseli', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'kategori', 'name' => 'kategori', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'tanggal', 'name' => 'tanggal', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'status', 'name' => 'status', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'deskripsi', 'name' => 'deskripsi', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'action', 'name' => 'action', 'orderable' => 'false', 'searchable' => 'false']
                ]
            ]
        ];
        return view('konselor.permintaan-konseling-index', $data);
    }
}
