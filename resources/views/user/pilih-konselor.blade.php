<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card table-card review-card">
            <div class="card-header borderless ">
                <h5>{{ $title }}</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option"></div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="review-block">
                    @foreach ($konselor as $row)
                        @php
                            $detail = json_decode($row->details, true);
                        @endphp
                        <div class="row border-top">
                            <div class="col-sm-auto p-r-0">
                                <img src="{{ foto_profil($row->foto) }}" alt="user image"
                                    class="img-radius profile-img cust-img m-b-15">
                            </div>
                            <div class="col">
                                <h6 class="m-b-5">
                                    {{ $row->name }}
                                    <small class="float-right text-muted">
                                        bergabung sejak: {{ date('Y', strtotime($row->created_at)) }}
                                    </small>
                                </h6>
                                <p class="m-t-5 m-b-15">
                                    <span><b>Pengalaman:</b> {{ $detail['pengalaman'] ?? '-' }} tahun</span> <br>
                                    <b>Spesialisasi:</b> <br>
                                    @foreach ($row->spesialisasi as $sp)
                                        <span class="badge badge-warning">{{ $sp->name }}</span>
                                    @endforeach
                                    <br>
                                    <b>Jadwal:</b>
                                    @if ($row->jadwal)
                                        <table border="1" cellpadding="4" style="font-size: 12px; margin:0px;">
                                            <tr>
                                                <th>Hari</th>
                                                <th>Jam</th>
                                                <th>Metode</th>
                                            </tr>
                                            @foreach ($row->jadwal as $index => $jadwal)
                                                <tr>
                                                    <td>{{ $jadwal->hari }}</td>
                                                    <td>{{ $jadwal->jam }}</td>
                                                    <td>{{ ucwords($jadwal->metode) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-backend.app-layout>
