<?php

namespace App\Http\Controllers\Pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $reviews = Review::all();
        $barberman = User::where('level', 'Barberman')->get();
        $imageSlider = ImageSlider::all();
        Alert::html('<b>Ketentuan Booking</b>', '
    <div style="text-align: center; font-weight: bold">
        <p style="font-weight: bold">Maks cancel 15 menit, lebih dari itu booking akan batal.</p>
        <p style="font-weight: bold">Mohon booking dengan nomor yang bisa dihubungi</p>
    </div>', 'info')->showConfirmButton();

        return view('pelanggan.dashboard.index', compact('services', 'reviews', 'barberman', 'imageSlider'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reviews = Review::all();
        return view('pelanggan.reviews.create', compact('reviews'));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatdetail($id)
    {
        $imageSlider = ImageSlider::findOrFail($id);
        return view('pelanggan.imageSlider.detail', compact('imageSlider'));
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
