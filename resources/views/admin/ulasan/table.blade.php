<div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Wisata</th>
                <th>Tanggal Ulasan</th>
                <th>Komentar</th>
                <th>Aksi</th> <!-- Added for action buttons -->
            </tr>
        </thead>
        <tbody>
            @forelse ($ulasans as $ulasan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ulasan->user->name }}</td>
                    <td>{{ $ulasan->wisata->nama_wisata }}</td>
                    <td>{{ $ulasan->tanggal_ulasan }}</td>
                    <td>{{ $ulasan->komentar }}</td>
                    <td>
                        <!-- Delete Button -->
                            <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $loop->iteration }}"> <i class="bx bx-trash-alt"></i></button>
                        <x-admin.ui.modal-delete :route="route('admin.dashboard.ulasans.destroy', $wisata)"
                            modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data ulasan tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-2">
    {{ $ulasans->links('pagination::bootstrap-5') }}
</div>
