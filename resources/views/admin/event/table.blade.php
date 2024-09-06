<div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Acara</th>
                <th>Nama Acara</th>
                <th>Tanggal Acara</th>
                <th>Lokasi Acara</th>
                <th>Deskripsi Acara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ $event->fotoEvent() }}" alt="Gambar Acara" class="img-fluid" style="width: 100px">
                        <!--<p>{{ $event->fotoEvent() }}</p>-->
                    </td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->tanggal_event }}</td>
                    <td>{{ $event->lokasi_event }}</td>
                    <td>{{ Str::limit($event->deskripsi_event, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.dashboard.events.edit', $event) }}" class="btn btn-link text-success"> <i
                                class="bx bx-pencil"></i></a>

                        <a href="{{ route('admin.dashboard.events.gallery', $event) }}"
                            class="btn btn-link text-info">
                            <i class="bx bx-customize"></i></a>

                        <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $loop->iteration }}"><i class="bx bx-trash-alt"></i></button>

                        <x-admin.ui.modal-delete :route="route('admin.dashboard.events.destroy', $event)"
                            modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data acara tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-2">
    {{ $events->links('pagination::bootstrap-5') }}
</div>
