<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Contracts\View\View;
use App\Models\User;
use App\Models\Wisata;
use App\Services\SearchService;
use Illuminate\Http\RedirectResponse;

class UlasanController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(): View
    {
        $wisatas = Wisata::with('ulasans')->paginate(10);

        return view('admin.ulasan.index', [
            'wisatas' => $wisatas
        ]);
    }

    public function detail(Request $request, Wisata $wisata): View
    {
        $ulasan = Ulasan::where('wisata_id', $wisata->id);
        $ulasans = $this->searchService->handle($request, $ulasan, ['name', 'nama_wisata', 'tanggal_ulasan', 'komentar'], ['user', 'wisata'])->latest()->paginate(10)->withQueryString()->withPath('detail/' . $wisata->id);

        return view('admin.ulasan.detail', [
            'ulasans' => $ulasans,
            'wisata' => $wisata
        ]);
    }

    public function indexUlasan(Request $request): View
    {
        $ulasans = Ulasan::where('user_id', auth()->user()->id)->with(['user', 'wisata']);
        $ulasans = $this->searchService->handle($request, $ulasans, ['name', 'nama_wisata', 'tanggal_ulasan', 'komentar'], ['user', 'wisata'])->latest()->paginate(10)->withQueryString()->withPath('ulasans');

        return view('user.ulasan.index', [
            'ulasans' => $ulasans
        ]);
    }

    public function searchAdmin(Request $request, Wisata $wisata): View
    {
        $ulasan = Ulasan::where('wisata_id', $wisata->id);

        return view('admin.ulasan.table', [
            'ulasans' => $this->searchService->handle($request, $ulasan, ['name', 'nama_wisata', 'tanggal_ulasan', 'komentar'], ['user', 'wisata'])->latest()->paginate(10)->withQueryString()->withPath('detail/' . $wisata->id),
        ]);
    }

    public function searchUser(Request $request)
    {
        $ulasans = Ulasan::where('user_id', auth()->user()->id)->with(['user', 'wisata']);

        return view('user.ulasan.table', [
            'ulasans' => $this->searchService->handle($request, $ulasans, ['name', 'nama_wisata', 'tanggal_ulasan', 'komentar'], ['user', 'wisata'])->latest()->paginate(10)->withQueryString()->withPath('ulasans'),
        ]);
    }
    

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'wisata_id' => ['required', 'exists:wisatas,id'],
            'komentar' => ['required', 'string']
        ]);

        Ulasan::create([
            'user_id' => auth()->user()->id,
            'wisata_id' => $request->wisata_id,
            'komentar' => $request->komentar,
            'tanggal_ulasan' => now(),
        ]);

        return back()->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function destroy(Ulasan $ulasan): RedirectResponse
{
    $ulasan->delete();
    return back()->with('success', 'Ulasan berhasil dihapus');
}

}
