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
                                        bergabung sejak {{ tgl_indo($row->created_at, false) }}
                                    </small>
                                </h6>
                                <p class="m-t-5 m-b-15">
                                    <span><b>Pengalaman:</b> {{ $detail['pengalaman'] ?? '-' }} tahun</span> <br>
                                    <b>Spesialisasi:</b> <br>
                                    @foreach ($row->spesialisasi as $row)
                                        <span class="badge badge-warning">{{ $row->name }}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-backend.app-layout>
