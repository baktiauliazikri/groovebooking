<?php

namespace App\Http\Livewire\Bookingpelanggan;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{

    public $currentStep = 1;
    public $pelanggan, $barberman, $service, $selectedService, $selectedBarberman, $selectedTanggal, $selectedJam, $tanggal, $jam, $status = 'booking';
    public $services, $barbermen, $pelanggans, $name, $email, $phone, $disableForm = false;
    public $successMessage = '';

    // Properti untuk menampung data


    public function render()
    {
        // Assign data ke properti yang telah dideklarasikan
        $this->services = Service::get();
        $this->barbermen = User::where('level', 'Barberman')->latest()->get();
        $this->pelanggans = User::where('level', 'Pelanggan')->latest()->get();

        return view('livewire.bookingpelanggan.create', [
            'service' => $this->services,
            'barberman' => $this->barbermen,
            'pelanggan' => $this->pelanggans,
        ]);
    }

    public function selectService($serviceId)
    {
        $this->selectedService = $serviceId;
    }


    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedService' => 'required',
        ]);

        // Setelah validasi, perbarui properti
        $this->service = $this->selectedService;

        // Pindah ke langkah berikutnya
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedBarberman' => 'required',
        ]);

        $this->barberman = $this->selectedBarberman;

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedTanggal' => 'required',
            'selectedJam' => 'required',
        ]);

        $this->tanggal = $this->selectedTanggal;
        $this->jam = $this->selectedJam;

        $this->currentStep = 4;
    }

    public function submitForm()
    {
        $pelanggan = Auth::user();

        Booking::create([
            'nama_pelanggan' => $pelanggan->id,
            'service_id' => $this->service,
            'barberman_id' => $this->barberman,
            'tanggal' => $this->selectedTanggal,
            'jam' => $this->selectedJam,
            'status' => $this->status,
        ]);

        $this->successMessage = 'Booking Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
        return redirect('/')->with('success', 'Kamu Berhasil Booking!');

    }

    public function getServiceName()
    {
        if ($this->selectedService) {
            $service = Service::find($this->selectedService);
            return $service ? $service->nama_service : null;
        }

        return null;
    }

    public function getBarbermanName()
    {
        if ($this->selectedBarberman) {
            $barberman = User::find($this->selectedBarberman);
            return $barberman ? $barberman->name : null;
        }

        return null;
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
