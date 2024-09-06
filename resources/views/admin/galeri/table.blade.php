 <div class="table-responsive">
     <table class="table table-bordered mb-0">
         <thead>
             <tr>
                 <th>No</th>
                 <th>Foto Galeri</th>
                 <th>Event</th>
                 <th>Wisata</th>
                 <th>Nama Galeri</th>
                 <th>Lokasi Galeri</th>
                 <th>Deskripsi Galeri</th>
                 <th>Aksi</th>
             </tr>
         </thead>
         <tbody>
             @forelse ($galeris as $galeri)
                 <tr>
                     <th scope="row">{{ $loop->iteration }}</th>
                     <td>
                         <img src="{{ $galeri->fotoGaleri() }}" alt="Gambar Galeri" class="img-fluid" style="width: 100px">
                     </td>
                     <td>{{ $galeri->event->nama_event }}</td>
                     <td>{{ $galeri->wisata->nama_wisata }}</td>
                     <td>{{ $galeri->nama_galeri }}</td>
                     <td>{{ $galeri->lokasi_galeri }}</td>
                     <td>{{ Str::limit($galeri->deskripsi_galeri, 50) }}</td>
                     <td>
                         <a href="{{ route('admin.dashboard.galeris.edit', $galeri) }}" class="btn btn-link text-success">
                             <i class="bx bx-pencil"></i></a>
                         <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal"
                             data-bs-target="#modal-{{ $loop->iteration }}"><i class="bx bx-trash-alt"></i></button>

                         <x-admin.ui.modal-delete :route="route('admin.dashboard.galeris.destroy', $galeri)"
                             modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>
                     </td>
                 </tr>
             @empty
                 <tr>
                     <td colspan="8" class="text-center">Data galeri tidak ditemukan</td>
                 </tr>
             @endforelse
         </tbody>
     </table>
 </div>

 <div class="mt-2">
     {{ $galeris->links('pagination::bootstrap-5') }}
 </div>
