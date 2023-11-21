<?php

namespace App\Http\Livewire\Bookingpelanggan;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use App\Models\Booking;


class Create extends Component
{

    public $currentStep = 1;
    public $pelanggan, $barberman, $service, $tanggal="", $jam, $status = 'booking';

    public $successMessage = '';

    public function render()
    {
        $service = Service::get();
        $barberman = User::where('level',  'Barberman')->latest()->get();
        $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();
        $booking = Booking::get();

        return view('livewire.bookingpelanggan.create',[
            'service' => $service,
            'barberman' => $barberman,
            'pelanggan' => $pelanggan,
            'booking' => $booking,
        ]);
        // return view('livewire.booking.create');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'service' => 'required',
        ]);
 
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'barberman' => 'required',
        ]);
  
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'tanggal' => 'required',
            'jam' => 'required',
        ]);
  
        $this->currentStep = 4;
    }

    public function submitForm()
    {
        Booking::create([
            'service' => $this->service,
            'barberman' => $this->barberman,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
            'status' => $this->status,
        ]);
  
        $this->successMessage = 'Booking Created Successfully.';
  
        $this->clearForm();
  
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function clearForm()
    {
        $this->service = '';
        $this->barberman = '';
        $this->tanggal = '';
        $this->jam = '';
        $this->status = 'booking';
    }



}
