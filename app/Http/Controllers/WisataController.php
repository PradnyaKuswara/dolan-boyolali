<?php

namespace App\Http\Controllers;

use App\Http\Requests\WisataRequest;
use App\Models\Galeri;
use App\Models\Wisata;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class WisataController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request): View
    {
        $wisatas = $this->searchService->handle($request, new Wisata, ['nama_wisata', 'lokasi_wisata', 'latitude', 'longitude', 'deskripsi_wisata', 'kategori_wisata'])->latest()->paginate(10)->withQueryString()->withPath('wisatas');

        return view('admin.wisata.index', [
            'wisatas' => $wisatas,
        ]);
    }

    public function create(): View
    {
        return view('admin.wisata.create');
    }

    public function store(WisataRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $imagePath = $data['foto_wisata']->store(Wisata::IMAGE_PATH);
        $data['foto_wisata'] = $imagePath;

        Wisata::create($data);

        return redirect()->route('admin.dashboard.wisatas.index');
    }

    public function edit(Wisata $wisata): View
    {
        return view('admin.wisata.edit', [
            'wisata' => $wisata,
        ]);
    }

    public function update(WisataRequest $request, Wisata $wisata): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto_wisata')) {
            Storage::delete($wisata->foto_wisata);
            $imagePath = $data['foto_wisata']->store(Wisata::IMAGE_PATH);
            $data['foto_wisata'] = $imagePath;
        }

        $wisata->update($data);

        return redirect()->route('admin.dashboard.wisatas.index');
    }

    public function destroy(Wisata $wisata): RedirectResponse
    {
        Storage::delete($wisata->foto_wisata);

        $wisata->delete();

        return redirect()->route('admin.dashboard.wisatas.index');
    }

    public function search(Request $request): View
    {
        return view('admin.wisata.table', [
            'wisatas' => $this->searchService->handle($request, new Wisata, ['nama_wisata', 'lokasi_wisata', 'latitude', 'longitude', 'deskripsi_wisata', 'kategori_wisata'])->latest()->paginate(10)->withQueryString()->withPath('wisatas'),
        ]);
    }

    public function gallery(Wisata $wisata): View
    {
        $wisata->load('galeris');

        return view('admin.wisata.galeri', [
            'wisata' => $wisata,
        ]);
    }

    public function storeGallery(Request $request, Wisata $wisata): RedirectResponse
    {
        $data = $request->validate([
            'image' => ['required', Rule::file()->image()->max(1024 * 1), 'mimes:jpg,jpeg,png'],
        ]);

        if ($wisata->galeris()->count() >= 12) {
            return redirect()->back()->with('error', 'Galeri Wisata sudah mencapai batas maksimal');
        }

        $imagePath = $data['image']->store(Galeri::IMAGE_PATH);

        $galeri = Galeri::create([
            'image' => $imagePath,
        ]);

        $wisata->galeris()->attach($galeri);

        return redirect()->route('admin.dashboard.wisatas.gallery', $wisata);
    }

    public function destroyGallery(Wisata $wisata, Galeri $galeri): RedirectResponse
    {
        Storage::delete($galeri->image);

        $wisata->galeris()->detach($galeri);

        $galeri->delete();

        return redirect()->route('admin.dashboard.wisatas.gallery', $wisata);
    }

    public function getNearbyPlaces(Wisata $wisata)
    {
        $allWisatas = Wisata::all();
        $nearbyPlaces = $allWisatas->filter(function ($place) use ($wisata) {
            return $this->calculateDistance($wisata->latitude, $wisata->longitude, $place->latitude, $place->longitude) <= 5;
        });

        return view('wisata.show', [
            'wisata' => $wisata,
            'nearbyPlaces' => $nearbyPlaces,
        ]);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Hitung jarak berdasarkan koordinat (contoh sederhana)
        $earthRadius = 6371; // Radius bumi dalam kilometer

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance; // Jarak dalam kilometer
    }
}
