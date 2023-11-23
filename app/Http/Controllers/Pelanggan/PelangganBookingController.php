<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman booking
            return view('pelanggan.booking.index');
        } else {
            // Jika belum login, kembalikan respons JSON
            return back()->withErrors([
                'email' => 'Login Terlebih Dahulu!!',
            ]);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $service = Service::get();
            $barberman = User::where('level',  'Barberman')->latest()->get();
            $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();
    
            return view('pelanggan.booking.create',[
                'service' => $service,
                'barberman' => $barberman,
                'pelanggan' => $pelanggan,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required',
            'service_id' => 'required',
            'barberman_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ], [
            'nama_pelanggan.required' => 'Nama Pelanggan tidak boleh kosong',
            'service_id.required' => 'Service',
            'barberman_id.required' => 'Gambar Service tidak boleh kosong',
            'tanggal.required' => 'Deskripsi Service tidak boleh kosong',
            'jam.required' => 'Harga Service tidak boleh kosong',
            'status.required' => 'Harga Service tidak boleh kosong',
        ]);
        Booking::create($validated);

        return redirect('/booking')->with('success', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
