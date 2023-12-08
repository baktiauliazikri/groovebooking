<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.imageslider.index', [
            'imageSliders' => ImageSlider::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.imageslider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'name' => 'required|min:4',
            'model' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'model' adalah field untuk menyimpan data gambar
            'desc' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama harus minimal 4 karakter',
            'model.required' => 'Gambar tidak boleh kosong',
            'model.image' => 'File harus berupa gambar',
            'model.mimes' => 'Format gambar yang didukung: jpeg, png, jpg, gif, svg',
            'model.max' => 'Ukuran gambar tidak boleh melebihi 2MB',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        // Penanganan Berkas
        if ($request->file('model')) {
            $file = $request->file('model');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/model', $fileName);
            $validated['model'] = str_replace('public/', '', $path); // Memperbarui field 'model' dengan path file yang disimpan
        }

        // Penyisipan ke Database
        ImageSlider::create($validated);

        // Redirect
        return redirect('/image-slider')->with('success', 'Data berhasil ditambahkan!');
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
        return view('admin.imageslider.edit', [
            'imageSlider' => ImageSlider::find($id),
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
        // Validasi
        $validated = $request->validate([
            'name' => 'required|min:4',
            'model' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'model' adalah field untuk menyimpan data gambar
            'desc' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama harus minimal 4 karakter',
            'model.image' => 'File harus berupa gambar',
            'model.mimes' => 'Format gambar yang didukung: jpeg, png, jpg, gif, svg',
            'model.max' => 'Ukuran gambar tidak boleh melebihi 2MB',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        // Temukan data berdasarkan ID
        $imageSlider = ImageSlider::findOrFail($id);

        // Penanganan Berkas
        if ($request->file('model')) {
            // Hapus gambar lama jika ada
            if ($imageSlider->model) {
                Storage::delete('public/' . $imageSlider->model);
            }

            // Upload gambar baru
            $file = $request->file('model');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $fileName);
            $validated['model'] = str_replace('public/', '', $path); // Memperbarui field 'model' dengan path file yang disimpan
        }

        // Update data dalam database
        $imageSlider->update($validated);

        // Redirect
        return redirect('/image-slider')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->oldPicture) {
            Storage::delete($request->oldPicture);
        }

        ImageSlider::where('id', $id)->delete();
        $title = 'Delete data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return redirect('/image-slider')->with('success', 'Data berhasil di Hapus!');
    }
}
