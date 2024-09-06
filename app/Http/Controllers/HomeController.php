<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::take(4)->get();
        $events = Event::take(3)->get();
        return view('index', [
            'wisatas' => $wisatas,
            'events' => $events
        ]);
    }

    public function tentangKami()
    {
        return view('tentang-kami');
    }

    public function destinasiwisata()
    {
        $wisatas = Wisata::paginate(8);
        return view('Wisata.destinasiwisata', [
            'wisatas' => $wisatas
        ]);
    }

    public function deskripsiwisata(Wisata $wisata)
    {
        $nearbyPlaces = Wisata::where('id', '!=', $wisata->id)
            ->selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$wisata->latitude, $wisata->longitude, $wisata->latitude])
            ->orderBy('distance')
            ->take(5)
            ->get();

        return view('Wisata.deskripsiwisata', [
            'wisata' => $wisata->with('ulasans')->find($wisata->id),
            'nearbyPlaces' => $nearbyPlaces
        ]);
    }

    public function events()
    {
        $events = Event::paginate(8);
        return view('Events.event', [
            'events' => $events
        ]);
    }


    public function deskripsievent(Event $event)
    {
        $popularEvents = Event::where('id', '!=', $event->id)->inRandomOrder()->take(3)->get();
        return view('Events.deskripsievent', [
            'event' => $event,
            'popularEvents' => $popularEvents
        ]);
    }

    public function cariWisata(Request $request)
    {

        $request->validate([
            'search' => 'required'
        ]);

        $wisata = Wisata::where('nama_wisata', 'like', '%' . $request->search . '%')->first();

        if ($wisata) {
            return redirect()->route('deskripsiwisata', $wisata->id);
        } else {
            return redirect()->back()->with('error', 'Wisata tidak ditemukan');
        }
    }

    public function cariEvent(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $event = Event::where('nama_event', 'like', '%' . $request->search . '%')->first();

        if ($event) {
            return redirect()->route('deskripsievent', $event->id);
        } else {
            return redirect()->back()->with('error', 'Event tidak ditemukan');
        }
    }
}