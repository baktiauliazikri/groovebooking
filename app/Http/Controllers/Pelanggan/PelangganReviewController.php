<?php

namespace App\Http\Controllers\Pelanggan;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class PelangganReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reviews = Review::all();
        return view('pelanggan.review.index', [
            'reviews' => Review::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.review.create');
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
            'nama_pengunjung' => 'required',
            'rating' => 'required',
            'ulasan' => 'required',
        ], [
            'nama_pengunjung.required' => 'Nama Pengunjung tidak boleh kosong',
            'rating.min' => 'Rating tidak boleh kosong',
            'ulasan.required' => 'Ulasan tidak boleh kosong',
        ]);
        Review::create($validated);
        return redirect('/')->with('success', 'Terima Kasih atas ulasannya');
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
