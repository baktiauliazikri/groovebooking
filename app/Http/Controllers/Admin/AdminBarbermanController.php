<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminBarbermanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barberman = User::where('level', 'Barberman')->latest()->get();

        return view('admin.barberman.index', [
            'barberman' => $barberman,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barberman.create');
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
            'name' => 'required',
            'foto_profile' => 'nullable', // Sesuaikan dengan kebutuhan Anda
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'social' => 'nullable|string',
            'password' => 'required|min:8', // Sesuaikan panjang minimal password
        ]);

        // Handle file upload (jika ada foto profil)
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/foto_profile', $fileName);
            $validated['foto_profile'] = str_replace('public/', '', $path);
        }

        // Hash password menggunakan bcrypt sebelum menyimpan ke dalam basis data
        $validated['foto_profile'] = $fileName;
        $validated['password'] = bcrypt($request->input('password'));
        $validated['level'] = 'Barberman';

        // Simpan user baru ke dalam database
        User::create($validated);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('/data-barberman')->with('success', 'User berhasil ditambahkan!');
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
        return view('admin.barberman.edit', [
            'barberman' => User::find($id)
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
        // Validasi data yang dikirim dari formulir
        $validated = $request->validate([
            'name' => 'required',
            'foto_profile' => 'nullable', // Sesuaikan dengan kebutuhan Anda
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'social' => 'nullable|string',
            'password' => 'nullable|min:8', // Sesuaikan panjang minimal password
        ]);

        // Handle file upload (jika ada foto profil)
        // Jika ada file foto_profile di dalam request
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/foto_profile', $fileName);
            $validated['foto_profile'] = str_replace('public/', '', $path);
        } else {
            // Jika tidak ada file foto_profile di dalam request, atur nilai default atau sesuai kebutuhan
            $fileName = null; // Atur nilai default sesuai kebutuhan
        }

        // Handle password
        if ($request->filled('password')) {
            // Jika password diisi, hash password menggunakan bcrypt
            $validated['password'] = bcrypt($request->input('password'));
        } else {
            // Jika password tidak diisi, biarkan password tetap seperti sebelumnya
            unset($validated['password']);
        }

        // dd($validated);
        // Update user ke dalam database
        $validated['foto_profile'] = $fileName;
        $barberman = User::findOrFail($id);
        $barberman->update($validated);


        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('/data-barberman')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->oldPicture){
            Storage::delete($request->oldPicture);
        }

        User::where('id', $id)->delete();

        return redirect('/data-barberman')->with('success', 'Data berhasil di Hapus!');
    }
}
