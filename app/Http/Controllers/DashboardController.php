<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Galeri;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __invoke()
    {

        if (auth()->user()->is_admin) {
            $wisataCount = Wisata::count();
            $guestCount = User::where('is_admin', 0)->count();
            $eventCount = Event::count();
            $galeriCount = Galeri::count();
            $ulasanCount = Ulasan::count();


            return view('admin.index', [
                'wisataCount' => $wisataCount,
                'guestCount' => $guestCount,
                'eventCount' => $eventCount,
                'galeriCount' => $galeriCount,
                'ulasanCount' => $ulasanCount
            ]);
        }

        if (!auth()->user()->is_admin)
        {
            $ulasanCount = Ulasan::where('user_id', auth()->user()->id)->count();

            return view('user.index', [
                'ulasanCount' => $ulasanCount
            ]);
        }
    }
}