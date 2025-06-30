<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Proteksi: hanya admin yang sudah login bisa akses
     */
    public function __construct()
    {
        if (!session()->has('admin')) {
            redirect('/login')->send();
        }
    }

    /**
     * Tampilkan semua data motor.
     */
    public function index()
    {
        $motors = Motor::all();
        return view('motor.index', compact('motors'));
    }

    /**
     * Tampilkan form tambah motor.
     */
    public function create()
    {
        return view('motor.create');
    }

    /**
     * Simpan data motor baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'no_polisi' => 'required|unique:motors',
            'harga_sewa' => 'required|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_motor', 'public');
        }

        $data['status'] = 'tersedia'; // default status

        Motor::create($data);

        return redirect()->route('motor.index')->with('success', 'Data motor berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit motor.
     */
    public function edit(Motor $motor)
    {
        return view('motor.edit', compact('motor'));
    }

    /**
     * Update data motor.
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'no_polisi' => 'required|unique:motors,no_polisi,' . $motor->id,
            'harga_sewa' => 'required|numeric',
            'status' => 'required|in:tersedia,dipinjam',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_motor', 'public');
        }

        $motor->update($data);

        return redirect()->route('motor.index')->with('success', 'Data motor berhasil diupdate');
    }

    /**
     * Hapus data motor.
     */
    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('motor.index')->with('success', 'Data motor berhasil dihapus');
    }
}
