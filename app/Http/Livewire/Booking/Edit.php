<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $service = Service::get();
        $barberman = User::where('level',  'Barberman')->latest()->get();
        $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();
        // $booking = Booking::find();

        return view('livewire.booking.edit',[
            'service' => $service,
            'barberman' => $barberman,
            'pelanggan' => $pelanggan,
            'booking' => ',,',
        ]);
    }
}
