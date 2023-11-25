<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::get();
        $service = Service::get();
        $users = User::where('level', 'Pelanggan','Barberman')->latest()->get();

        return view('admin.booking.index', [
            'bookings' => $bookings,
            'users' => $users,
            'service' => $service,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::get();
        $barberman = User::where('level',  'Barberman')->latest()->get();
        $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();

        return view('admin.booking.create',[
            'service' => $service,
            'barberman' => $barberman,
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
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

        return redirect('/data-booking')->with('success', 'Data berhasil di tambahkan!');
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
        $service = Service::get();
        $barberman = User::where('level',  'Barberman')->latest()->get();
        $pelanggan = User::where('level', 'Pelanggan',)->latest()->get();
        $booking = Booking::find($id);

        return view('admin.booking.edit',[
            'service' => $service,
            'barberman' => $barberman,
            'pelanggan' => $pelanggan,
            'booking' => $booking,
        ]);
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

        Booking::where('id', $id)->update([
            'status' => 'Selesai'
        ]);

        return redirect('/data-booking')->with('success', 'Pesanan sudah selesai!');
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
