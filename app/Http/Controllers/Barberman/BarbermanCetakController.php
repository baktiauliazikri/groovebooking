<?php

namespace App\Http\Controllers\Barberman;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarbermanCetakController extends Controller
{
    public function cetakbookingbarberman()
    {
        $barbermanId = Auth::id();
        $bookings = Booking::where('barberman_id', $barbermanId)->latest()->get();

        return view('barberman.booking.cetak', compact('bookings'));
    }
}
