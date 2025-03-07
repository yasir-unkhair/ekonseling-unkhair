<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Ringkasan Profil -->
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 text-primary">
                            <i class="fa fa-user"></i> Ringkasan Profil
                        </h5>
                        <table class="table table-sm">
                            <tr>
                                <th class="w-25">Nama</th>
                                <td class="w-75">:&nbsp;{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:&nbsp;{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>:&nbsp;{{ '' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:&nbsp;{{ '' }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Jadwal Konseling Berikutnya -->
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2 text-info">
                            <i class="fa fa-calendar"></i> Jadwal Konseling Berikutnya
                        </h5>
                        <table class="table table-sm">
                            <tr>
                                <th class="w-25">Konselor</th>
                                <td class="w-75">:&nbsp;{{ '' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>:&nbsp;{{ '' }}</td>
                            </tr>
                            <tr>
                                <th>Waktu</th>
                                <td>:&nbsp;{{ '' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:&nbsp;{{ '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h5 class="mt-5 border-bottom pb-2 text-danger">
                    <i class="fa fa-clock"></i> Status Permintaan Konseling
                </h5>
                <table class="table table-sm">
                    <tr>
                        <th class="w-25">Tanggal Permintaan</th>
                        <td class="w-75">:&nbsp;12 Desember 2025</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:&nbsp;
                            <span class="text-warning">
                                Permintaan Anda sedang diproses. Harap tunggu konfirmasi
                                dari konselor.
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-backend.app-layout>
