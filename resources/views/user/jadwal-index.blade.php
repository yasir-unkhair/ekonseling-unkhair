<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" onclick="pengajuan_konseling()" class="btn btn-sm btn-primary">
                            <i class="feather icon-plus"></i> Pengajuan Konseling
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="{{ $datatable['id_table'] }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Koselor</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Ket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <livewire:user.pengajuan-konseling />

    @push('style')
        <link href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" rel="stylesheet">
    @endpush

    @push('script')
        <!-- datatble js -->
        <script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
        <script type="text/javascript">
            var table;
            $(function() {
                table = $("#{{ $datatable['id_table'] }}").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ $datatable['url'] }}",
                        data: function(d) {}
                    },
                    columns: [
                        @foreach ($datatable['columns'] as $row)
                            {
                                data: "{{ $row['data'] }}",
                                name: "{{ $row['name'] }}",
                                orderable: {{ $row['orderable'] }},
                                searchable: {{ $row['searchable'] }}
                            },
                        @endforeach
                    ]
                });
            });

            function pengajuan_konseling() {
                Livewire.dispatch('show-modal-pengajuan');
            }

            function edit(id) {
                Livewire.dispatch('show-modal-edit-pengajuan', {
                    id: id
                });
            }

            function hapus(id) {
                if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                    Livewire.dispatch('delete-jadwal', {
                        id: id
                    });
                }
            }
        </script>
    @endpush
</x-backend.app-layout>
