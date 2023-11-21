<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index', [
            'services' => Service::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'nama_service' => 'required|min:4',
            'photo' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ], [
            'nama_service.required' => 'Nama Service tidak boleh kosong',
            'nama_service.min' => 'Nama Service minimal 4 karakter',
            'photo.required' => 'Gambar Service tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi Service tidak boleh kosong',
            'harga.required' => 'Harga Service tidak boleh kosong',
        ]);

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            
            $path = $file->storeAs('public/photo', $fileName);
            $validated['photo'] = str_replace('public/', '', $path);
        }
        
        Service::create($validated);

        return redirect('/data-service')->with('success', 'Data berhasil di tambahkan!');
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
        return view('admin.service.edit', [
            'services' => Service::find($id),
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
        // Validasi input
        $validated = $request->validate([
            'nama_service' => 'required|min:4',
            'photo' => 'nullable', // Menjadi nullable karena gambarnya opsional pada proses update
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ], [
            'nama_service.required' => 'Nama Service tidak boleh kosong',
            'nama_service.min' => 'Nama Service minimal 4 karakter',
            'deskripsi.required' => 'Deskripsi Service tidak boleh kosong',
            'harga.required' => 'Harga Service tidak boleh kosong',
        ]);

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storeAs('public/photo', $request->file('photo')->getClientOriginalName());
            $validated['photo'] = str_replace('public/', '', $path);
        }

        // Update data service
        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect('/data-service')->with('success', 'Data berhasil di perbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Request $request, $id)
    {
        if($request->oldPicture){
            Storage::delete($request->oldPicture);
        }

        Service::where('id', $id)->delete();

        return redirect('/data-service')->with('success', 'Data berhasil di Hapus!');
    }
}
