<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PelangganProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = User::where('level', 'pelanggan')->latest()->get();
        return view('pelanggan.profile.index', ['pelanggan' => $pelanggan,]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('pelanggan.profile.edit', [
        //     'pelanggan' => User::find($id)
        // ]);
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
            'phone' => 'nullable',
            'alamat' => 'nullable',
            'social' => 'nullable',
            'foto_profile' => 'nullable',
            'password' => 'required|confirmed',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama user minimal 4 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('foto_profile')) {
            // Hapus foto lama (jika ada)
            Storage::delete('public/' . $request->foto_profile);

            $path = $request->file('foto_profile')->storeAs('public/foto_profile/pelanggan', $request->file('foto_profile')->getClientOriginalName());
            // Simpan foto yang baru diunggah
            $validated['foto_profile'] = str_replace('public/', '', $path);
        }

        $validated['password'] = bcrypt($request->input('password'));

        // Update data user
        $user = User::findOrFail($id);
        $user->update($validated);

        // dd($validated); // Melihat data yang sudah divalidasi sebelum disimpan
        // dd($user); // Melihat data user setelah pembaruan

        return redirect('/pelanggan-profile')->with('success', 'Profile berhasil di Update!');
    }

    public function password($id)
    {
    }

    // public function updatePassword(Request $request, $id)
    // {
    //     $request->validate([
    //         'current_password' => 'required',
    //         'new_password' => 'required|min:8',
    //         'confirm_password' => 'required|same:new_password',
    //     ]);

    //     $user = User::find($id);

    //     // Check if the current password matches the user's password
    //     if (!Hash::check($request->current_password, $user->password)) {
    //         return redirect()->back()->with('error', 'Current password is incorrect.');
    //     }

    //     // Update the user's password
    //     $user->password = Hash::make($request->new_password);
    //     $user->save();

    //     return redirect()->back()->with('success', 'Password has been updated successfully.');
    // }

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
