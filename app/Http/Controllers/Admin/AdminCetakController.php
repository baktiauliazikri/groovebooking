<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;


class AdminCetakController extends Controller
{
    public function cetakHarian(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);
        
        // dd($request);
        $tanggal_awal = date('Y-m-d', strtotime($request->input('tanggal_awal')));
        $tanggal_akhir = date('Y-m-d', strtotime($request->input('tanggal_akhir')));
        
        // dd($request->tanggal_akhir);
        $bookings = Booking::
        // whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            // where('created_at','>=', $request->tanggal_awal)
            where('created_at','<=', '2023-12-07 17:35:40')
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        $total_pemasukan = $bookings->sum('service.harga');
        
        // dd($bookings);
        return view('admin.cetak.harian', compact('tanggal_awal', 'tanggal_akhir', 'bookings', 'total_pemasukan'));
    }


    public function cetakBulanan(Request $request)
    {
        $request->validate([
            'bulan' => 'required|date_format:Y-m',
        ]);

        $bulan = $request->input('bulan');

        $bookings = Booking::whereMonth('created_at', date('m', strtotime($bulan)))
            ->where('status', 'selesai')
            ->latest()
            ->get();

        // Calculate total pemasukan
        $total_pemasukan = $bookings->sum(function ($booking) {
            return $booking->service->harga;
        });

        return view('admin.cetak.bulanan', [
            'bulan' => $bulan,
            'bookings' => $bookings,
            'total_pemasukan' => $total_pemasukan,
        ]);
    }

    public function cetakTahunan(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 1), // Sesuaikan dengan range tahun yang diinginkan
        ]);

        $tahun = $request->input('tahun');

        $bookings = Booking::whereYear('created_at', $tahun)
            ->where('status', 'selesai')
            ->latest()
            ->get();

        // Calculate total pemasukan
        $total_pemasukan = $bookings->sum(function ($booking) {
            return $booking->service->harga;
        });

        return view('admin.cetak.tahunan', [
            'tahun' => $tahun,
            'bookings' => $bookings,
            'total_pemasukan' => $total_pemasukan,
        ]);
    }
}
