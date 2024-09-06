  <div class="table-responsive">
      <table class="table table-bordered mb-0">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Nama Wisata</th>
                  <th>Tanggal Ulasan</th>
                  <th>Komentar</th>
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
                  </tr>
              @empty
                  <tr>
                      <td colspan="5" class="text-center">Data ulasan tidak ditemukan</td>
                  </tr>
              @endforelse
          </tbody>
      </table>
  </div>

  <div class="mt-2">
      {{ $ulasans->links('pagination::bootstrap-5') }}
  </div>
