<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('konselor.dashboard', ['title' => 'Dashboard']);
    }

    public function notification(Request $request)
    {
        // $data = [
        //     'title' => 'Notifikasi',
        //     'notifications' => auth()->user()->notifications
        // ];

        // dd($data);

        if ($request->ajax()) {
            $result = auth()->user()->notifications;
            return DataTables::of($result)
                ->addIndexColumn()
                ->editColumn('nama_konseli', function ($row) {
                    $foto = foto_profil($row->data['foto']);
                    return '
                    <div class="d-inline-block align-middle">
                        <img src="' . $foto . '" alt="user image"
                            class="img-radius wid-40 align-top m-r-15">
                        <div class="d-inline-block">
                            <h6>' . $row->data['name'] . '</h6>
                            <p class="text-primary m-b-0">' . $row->data['email'] . '</p>
                        </div>
                    </div>
                    ';
                })
                ->editColumn('notifikasi', function ($row) {
                    return $row->data['messages'];
                })
                ->editColumn('tanggal', function ($row) {
                    return tgl_indo($row->created_at, true);
                })
                ->editColumn('status', function ($row) {
                    return $row->read_at ? '<span class="badge badge-light-success">Sudah dibaca</span>' : '<span class="badge badge-light-danger">Belum dibaca</span>';
                })
                ->addColumn('action', function ($row) {
                    if (!$row->read_at) {
                        return '
                            <a href="' . route('counselor.notification.read', $row->id) . '" class="btn btn-sm btn-info">Read</a>
                        ';
                    }
                    return '-';
                })
                ->rawColumns(['nama_konseli', 'notifikasi', 'tanggal', 'status', 'action'])
                ->make(true);
        }

        $data = [
            'title' => 'Notiifikasi',
            'datatable' => [
                'url' => route('counselor.notification'),
                'id_table' => 'id-datatable',
                'columns' => [
                    ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'nama_konseli', 'name' => 'nama_konseli', 'orderable' => 'false', 'searchable' => 'false'],
                    ['data' => 'notifikasi', 'name' => 'notifikasi', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'tanggal', 'name' => 'tanggal', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'status', 'name' => 'status', 'orderable' => 'true', 'searchable' => 'false'],
                    ['data' => 'action', 'name' => 'action', 'orderable' => 'false', 'searchable' => 'false']
                ]
            ]
        ];

        return view('konselor.notification', $data);
    }

    public function read_notification($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        $notification->markAsRead();
        return redirect()->back();
    }

    public function list_notification()
    {
        $notifications = auth()->user()->notifications->markAsRead();
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('frontend.beranda'));
    }
}
