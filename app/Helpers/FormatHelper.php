<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tgl, $time = TRUE)
    {
        if (!$tgl) {
            return '';
        }
        $date = \Carbon\Carbon::parse($tgl)->locale('id');

        $date->settings(['formatFunction' => 'translatedFormat']);

        if (!$time) {
            return $date->format('d M Y');
        }
        return $date->format('d M Y H:i');
    }
}


if (!function_exists('str_range_tanggal')) {
    function str_range_tanggal($mulai, $selesai = NULL)
    {
        if (!$mulai) {
            return '';
        }

        if (!$selesai) {
            return tgl_indo($mulai, false);
        }

        $tgl_mulai = \Carbon\Carbon::parse($mulai);
        $tgl_selesai = \Carbon\Carbon::parse($selesai);

        if (($tgl_mulai->year != $tgl_selesai->year) || ($tgl_mulai->month != $tgl_selesai->month)) {
            return tgl_indo($mulai, false) . ' s/d ' . tgl_indo($selesai, false);
        }

        if ($tgl_mulai->day != $tgl_selesai->day) {
            return $tgl_mulai->day . '-' . tgl_indo($selesai, false);
        }

        return tgl_indo($selesai, false);
    }
}

if (!function_exists('format_status_pengajuan')) {
    function format_status_pengajuan($status)
    {
        switch ($status) {
            case 'pending':
                return '<span class="badge badge-light-warning">Menunggu Konfirmasi..</span>';
            case 'approved':
                return '<span class="badge badge-light-success">Disetujui</span>';
            case 'rejected':
                return '<span class="badge badge-light-danger">Ditolak!</span>';
            case 'ongoing':
                return '<span class="badge badge-light-info">Dalam Proses</span>';
            case 'completed':
                return '<span class="badge badge-light-primary">Selesai</span>';
        }
    }
}
