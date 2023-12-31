<?php

namespace App\Http\Livewire\Bookingpelanggan;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{

    public $tanggal = "";
    public $selectedSlots = [];
    public $currentStep = 1;
    public $pelanggan, $barberman, $service, $selectedService, $selectedBarberman, $selectedTanggal, $selectedJam, $jam, $status = 'booking';
    public $services, $barbermen, $pelanggans, $name, $email, $phone, $disableForm = false;



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

    public function getAvailableSlots()
    {
        // Inisialisasi array untuk menyimpan jam
        $allSlots = array();

        // Waktu awal
        $startTime = strtotime('10:00:00');

        // Waktu akhir
        $endTime = strtotime('23:00:00');


        // Loop untuk menambahkan jam ke dalam array
        for ($i = $startTime; $i <= $endTime; $i += 3600) { // 3600 detik = 1 jam
            $allSlots[] = date('H:i:s', $i);
        }

        // Jika tidak ada tanggal yang dipilih, kembalikan semua slot
        if (empty($this->selectedTanggal)) {
            return $allSlots;
        }

        // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = $this->getBookedSlots();

        // Ambil slot yang belum dibooking
        $availableSlots = [];

        foreach ($allSlots as $data) {
            $isSimilar = false;

            foreach ($bookedSlots as $dataSlot) {
                if ($data == $dataSlot) {
                    $isSimilar = true;
                    break;
                } else {
                    $isSimilar = false;
                }
            }

            if (!$isSimilar) {

                if ($this->selectedTanggal == now()->toDateString()) {

                    if ($data >= date('H:00:00')) {
                        $availableSlots[] = $data;
                    }
                } else {
                    $availableSlots[] = $data;
                }
            }
        }

        return $availableSlots;
    }

    private function getBookedSlots()
    {
        // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = Booking::where('tanggal', $this->selectedTanggal)
        ->where('barberman_id', $this->barberman)
        ->where('status', '!=', 'Dibatalkan')
        ->pluck('jam')
        ->toArray();
        
        // dd($bookedSlots);
        // Ambil slot yang sudah dibooking untuk tanggal-tanggal selanjutnya dari hari ini
        $futureBookedSlots = Booking::where('tanggal', '>', now()->toDateString())
            ->where('status', '!=', 'Dibatalkan')
            ->pluck('jam')
            ->toArray();

        // Gabungkan slot yang sudah dibooking pada tanggal yang dipilih dan tanggal-tanggal selanjutnya
        //$bookedSlots = array_merge($bookedSlots, $futureBookedSlots);

        return $bookedSlots;
    }

    public function selectService($serviceId)
    {
        $this->selectedService = $serviceId;
    }
    public function selectBarberman($barbermanId)
    {
        $this->selectedBarberman = $barbermanId;
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

        $this->tanggal = $validatedData['selectedTanggal'];
        $this->jam = $validatedData['selectedJam'];

        // Dapatkan slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = $this->getBookedSlots();

        // Periksa apakah slot yang dipilih sudah dibooking oleh pelanggan lain
        if (in_array($this->jam, $bookedSlots)) {
            // Handle kasus di mana slot sudah dibooking
            // Anda dapat menambahkan pesan kesalahan atau mengambil tindakan tertentu
            // Contoh: return redirect()->back()->with('error', 'Slot ini sudah dibooking.');
        } else {
            // Slot belum dibooking, simpan slot yang dipilih oleh pelanggan
            $this->selectedSlots[] = $this->jam;
        }

        // Pindah ke langkah berikutnya
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

        $this->clearForm();

        $this->currentStep = 1;
        return redirect('/my-booking')->with('success', 'Kamu Berhasil Booking!');
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
