<?php

namespace App\Http\Controllers\Barberman;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;

class BarbermanCetakController extends Controller
{
    public function cetakbookingbarberman(Request $request)
    {
        $barbermanId = Auth::id();
        $bookings = Booking::where('barberman_id', $barbermanId)->latest()->get();

        return view('barberman.booking.cetak', compact('bookings'));
    }
}
