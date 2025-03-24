@props([
    'page_title' => 'No title',
    'dokumens' => [],
    'tanggalList' => [],
    'bulanTahunList',
    'tahunList',
    'add' => '',
    'show' => '',
    'delete' => '',
])

<div class="container mt-4">
    <h3 class="mb-3">{{ $page_title }}</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tombol Trigger Modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
        Upload Dokumen
    </button>

    <!-- Modal Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route($add) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Dokumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control"
                                placeholder="Masukkan judul dokumen" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Dokument</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File (PDF)</label>
                            <input type="file" name="file" class="form-control" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Filter Dokumen -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Filter Dokumen</h5>
            <form method="GET" action="{{ request()->url() }}" class="mb-3" id="filterForm">
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            placeholder="Cari berdasarkan tanggal" value="{{ request('tanggal') }}"
                            onchange="clearFilters('tanggal')">
                    </div>
                    <div class="col-md-3">
                        <select name="bulan_tahun" id="bulan_tahun" class="form-control"
                            onchange="clearFilters('bulan_tahun')">
                            <option value="">Cari berdasarkan bulan & tahun</option>
                            @foreach ($bulanTahunList as $bulanTahun)
                                <option value="{{ $bulanTahun }}"
                                    {{ request('bulan_tahun') == $bulanTahun ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m', $bulanTahun)->translatedFormat('F Y') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="tahun" id="tahun" class="form-control" onchange="clearFilters('tahun')">
                            <option value="">Cari berdasarkan tahun</option>
                            @foreach ($tahunList as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ request()->url() }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Dokumen -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Dokumen</h5>
            @if ($dokumens->isEmpty())
                <p class="text-muted">Belum ada dokumen yang diunggah.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Dokumen</th>
                                <th>Tanggal Document</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumens as $dokumen)
                                <tr>
                                    <td>{{ $dokumen->judul }}</td>
                                    <td>
                                        <a href="{{ $dokumen->getFirstMediaUrl($show) }}" class="btn btn-sm btn-info"
                                            target="_blank">
                                            Lihat
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($dokumen->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route($delete, $dokumen) }}')">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus dokumen ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Script konfirmasi hapus
        function confirmDelete(actionUrl) {
            let form = document.getElementById('deleteForm');
            form.action = actionUrl;
            let modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            modal.show();
        }

        // Script clear filters
        function clearFilters(selected) {
            if (selected !== 'tanggal') {
                document.getElementById('tanggal').value = '';
            }
            if (selected !== 'bulan_tahun') {
                document.getElementById('bulan_tahun').value = '';
            }
            if (selected !== 'tahun') {
                document.getElementById('tahun').value = '';
            }
        }
    </script>
@endpush
