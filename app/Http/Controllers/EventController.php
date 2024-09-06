<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Galeri;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request): View
    {
        $events = $this->searchService->handle($request, new Event, ['nama_event', 'tanggal_event', 'lokasi_event', 'deskripsi_event'])->latest()->paginate(10)->withQueryString()->withPath('events');

        return view('admin.event.index', [
            'events' => $events,
        ]);
    }

    public function create(): View
    {
        return view('admin.event.create');
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $imagePath = $data['foto_event']->store(Event::IMAGE_PATH);
        $data['foto_event'] = $imagePath;

        Event::create($data);

        return redirect()->route('admin.dashboard.events.index');
    }

    public function edit(Event $event): View
    {
        return view('admin.event.edit', [
            'event' => $event,
        ]);
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto_event')) {
            Storage::delete($event->foto_event);
            $imagePath = $data['foto_event']->store(Event::IMAGE_PATH);
            $data['foto_event'] = $imagePath;
        }

        $event->update($data);

        return redirect()->route('admin.dashboard.events.index');
    }

    public function destroy(Event $event): RedirectResponse
    {
        Storage::delete($event->foto_event);

        $event->delete();

        return redirect()->route('admin.dashboard.events.index');
    }

    public function search(Request $request): View
    {
        return view('admin.event.table', [
            'events' => $this->searchService->handle($request, new Event, ['nama_event', 'tanggal_event', 'lokasi_event', 'deskripsi_event'])->latest()->paginate(10)->withQueryString()->withPath('events'),
        ]);
    }

    public function gallery(Event $event): View
    {
        $event->load('galeris');

        return view('admin.event.galeri', [
            'event' => $event,
        ]);
    }

    public function storeGallery(Request $request, Event $event): RedirectResponse
    {

        $data = $request->validate([
            'image' => ['required', Rule::file()->image()->max(1024 * 1), 'mimes:jpg,jpeg,png'],
        ]);

        if ($event->galeris()->count() >= 12) {
            return redirect()->back()->with('error', 'Galeri Wisata sudah mencapai batas maksimal');
        }

        $imagePath = $data['image']->store(Galeri::IMAGE_PATH);

        $galeri = Galeri::create([
            'image' => $imagePath,
        ]);

        $event->galeris()->attach($galeri);

        return redirect()->route('admin.dashboard.events.gallery', $event);
    }

    public function destroyGallery(Event $event, Galeri $galeri): RedirectResponse
    {

        Storage::delete($galeri->image);

        $event->galeris()->detach($galeri);

        $galeri->delete();

        return redirect()->route('admin.dashboard.events.gallery', $event);
    }
}
