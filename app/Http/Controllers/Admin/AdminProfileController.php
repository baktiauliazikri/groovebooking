<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('admin.profile.index', [
            'user' => User::find($id),
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
        // dd($request->all()); // Debug sebelum validasi

        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'foto_profile' => 'nullable', // Menjadi nullable karena gambarnya opsional pada proses update
            'password' => 'required|confirmed',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama user minimal 4 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password user tidak boleh kosong',
        ]);

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('foto_profile')) {
            // Hapus foto lama (jika ada)
            Storage::delete('public/' . $request->foto_profile);

            $path = $request->file('foto_profile')->storeAs('public/foto_profile', $request->file('foto_profile')->getClientOriginalName());
            // Simpan foto yang baru diunggah
            $validated['foto_profile'] = str_replace('public/', '', $path);
        }

        $validated['password'] = bcrypt($request->input('password'));

        // Update data user
        $user = User::findOrFail($id);
        $user->update($validated);

        // dd($validated); // Melihat data yang sudah divalidasi sebelum disimpan
        // dd($user); // Melihat data user setelah pembaruan

        return redirect('/profile')->with('success', 'Profile berhasil di Update!');
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
