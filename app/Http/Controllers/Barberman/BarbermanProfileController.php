<?php

namespace App\Http\Controllers\Barberman;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BarbermanProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barberman.profile.index');
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
        return view('barberman.profile.index', [
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
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'foto_profile' => 'nullable', // Menjadi nullable karena gambarnya opsional pada proses update
            'password' => 'required|confirmed', // Ubah aturan validasi password menjadi nullable
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama user minimal 4 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password user tidak boleh kosong',
        ]);

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/foto_profile/barberman/', $fileName);
            $validated['foto_profile'] = str_replace('public/', '', $path);
        } else {
            // Jika tidak ada file foto_profile di dalam request, atur nilai default atau sesuai kebutuhan
            $fileName = null; // Atur nilai default sesuai kebutuhan
        }

        $validated['password'] = bcrypt($request->input('password'));

        // Update data user
        $validated['foto_profile'] = $fileName;
        $user = User::findOrFail($id);
        $user->update($validated);

        // dd($validated); // Melihat data yang sudah divalidasi sebelum disimpan
        // dd($user); // Melihat data user setelah pembaruan

        return redirect('/profile-barberman')->with('success', 'Profile berhasil di Update!');
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
