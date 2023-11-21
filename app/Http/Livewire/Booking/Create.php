<?php

namespace App\Http\Livewire\Booking;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;



class Create extends Component
{
    public $tanggal="";

    public function render()
    {
        $service = Service::get();
        $barberman = User::where('level',  'Barberman')->latest()->get();
        $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();

        return view('livewire.booking.create',[
            'service' => $service,
            'barberman' => $barberman,
            'pelanggan' => $pelanggan,
        ]);
        // return view('livewire.booking.create');
    }
}
