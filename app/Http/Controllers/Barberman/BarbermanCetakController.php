<?php

namespace App\Http\Controllers\Barberman;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarbermanCetakController extends Controller
{
    public function cetakbookingbarberman()
    {
        $barbermanId = Auth::id();
        $bookings = Booking::where('barberman_id', $barbermanId)->latest()->get();

        $pdf = PDF::loadView('barberman.booking.cetak', [
            'bookings' => $bookings,
        ]);

        return $pdf->stream();
    }
}
