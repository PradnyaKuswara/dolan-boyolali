 <div class="table-responsive">
     <table class="table table-bordered mb-0">
         <thead>
             <tr>
                 <th>No</th>
                 <th>Gambar Wisata</th>
                 <th>Nama Wisata</th>
                 <th>Lokasi Wisata</th>
                 <th>Latitude</th>
                 <th>Longitude</th>
                 <th>Deskripsi Wisata</th>
                 <th>Kategori Wisata</th>
                 <th>Aksi</th>
             </tr>
         </thead>
         <tbody>
             @forelse ($wisatas as $wisata)
                 <tr>
                     <th scope="row">{{ $loop->iteration }}</th>
                     <td>
                         <img src="{{ $wisata->fotoWisata() }}" alt="Gambar Wisata" class="img-fluid" style="width: 100px">
                     </td>
                     <td>{{ $wisata->nama_wisata }}</td>
                     <td>{{ Str::limit($wisata->lokasi_wisata, 50) }}</td>
                     <td>{{ $wisata->latitude }}</td>
                     <td>{{ $wisata->longitude }}</td>
                     <td>{{ Str::limit($wisata->deskripsi_wisata, 50) }}</td>
                     <td>{{ $wisata->kategori_wisata }}</td>
                     <td>
                         <a href="{{ route('admin.dashboard.wisatas.edit', $wisata) }}" class="btn btn-link text-success">
                             <i class="bx bx-pencil"></i></a>

                         <a href="{{ route('admin.dashboard.wisatas.gallery', $wisata) }}"
                             class="btn btn-link text-info">
                             <i class="bx bx-customize"></i></a>

                         <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal"
                             data-bs-target="#modal-{{ $loop->iteration }}"> <i class="bx bx-trash-alt"></i></button>

                         <x-admin.ui.modal-delete :route="route('admin.dashboard.wisatas.destroy', $wisata)"
                             modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>


                     </td>
                 </tr>
             @empty
                 <tr>
                     <td colspan="9" class="text-center">Data wisata tidak ditemukan</td>
                 </tr>
             @endforelse
         </tbody>
     </table>
 </div>

 <div class="mt-2">
     {{ $wisatas->links('pagination::bootstrap-5') }}
 </div>

 @push('scripts')
     <script>
         feather.replace();
     </script>
 @endpush
