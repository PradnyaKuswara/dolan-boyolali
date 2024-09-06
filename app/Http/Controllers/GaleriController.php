<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Event;
use App\Models\Galeri;
use App\Models\Wisata;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request): View
    {
        $galeris = $this->searchService->handle($request, new Galeri, ['nama_galeri', 'lokasi_galeri', 'deskripsi_galeri', 'nama_wisata', 'nama_event'], ['wisata', 'event'])->latest()->paginate(10)->withQueryString()->withPath('galeris');

        return view('admin.galeri.index', [
            'galeris' => $galeris,
        ]);
    }

    public function create(): View
    {
        $events = Event::latest()->get();
        $wisatas = Wisata::latest()->get();

        return view('admin.galeri.create', [
            'events' => $events,
            'wisatas' => $wisatas
        ]);
    }

    public function store(GaleriRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data = Arr::only($data, ['event_id', 'wisata_id', 'nama_galeri', 'lokasi_galeri', 'foto_galeri', 'deskripsi_galeri']);

        $imagePath = $data['foto_galeri']->store(Galeri::IMAGE_PATH);
        $data['foto_galeri'] = $imagePath;

        Galeri::create($data);

        return redirect()->route('admin.dashboard.galeris.index');
    }

    public function edit(Galeri $galeri): View
    {
        $events = Event::latest()->get();
        $wisatas = Wisata::latest()->get();

        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            'events' => $events,
            'wisatas' => $wisatas
        ]);
    }

    public function update(GaleriRequest $request, Galeri $galeri): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto_galeri')) {
            Storage::delete($galeri->foto_galeri);
            $imagePath = $data['foto_galeri']->store(Galeri::IMAGE_PATH);
            $data['foto_galeri'] = $imagePath;
        }

        $galeri->update($data);

        return redirect()->route('admin.dashboard.galeris.index');
    }

    public function destroy(Galeri $galeri): RedirectResponse
    {
        Storage::delete($galeri->foto_galeri);

        $galeri->delete();

        return redirect()->route('admin.dashboard.galeris.index');
    }

    public function search(Request $request): View
    {
        // dd($request->all());
        return view('admin.galeri.table', [
            'galeris' => $this->searchService->handle($request, new Galeri, ['nama_galeri', 'lokasi_galeri', 'deskripsi_galeri', 'nama_wisata', 'nama_event'], ['wisata', 'event'])->latest()->paginate(10)->withQueryString()->withPath('galeris'),
        ]);
    }
}
