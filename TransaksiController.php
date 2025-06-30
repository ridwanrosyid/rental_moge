<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Motor;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        if (!session()->has('admin')) {
            redirect('/login')->send();
        }
    }

    public function index()
    {
        $transaksis = Transaksi::with('motor')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $motors = Motor::where('status', 'tersedia')->get();
        return view('transaksi.create', compact('motors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'motor_id' => 'required|exists:motors,id',
            'nama_penyewa' => 'required|string|max:100',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $motor = Motor::find($request->motor_id);
        $durasi = (strtotime($request->tanggal_kembali) - strtotime($request->tanggal_pinjam)) / 86400;
        $durasi = $durasi == 0 ? 1 : $durasi;

        $total = $durasi * $motor->harga_sewa;

        Transaksi::create([
            'motor_id' => $request->motor_id,
            'nama_penyewa' => $request->nama_penyewa,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_biaya' => $total,
            'status' => 'berlangsung'
        ]);

        // Update status motor
        $motor->update(['status' => 'dipinjam']);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat');
    }

    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'status' => 'required|in:berlangsung,selesai',
        ]);

        $transaksi->update(['status' => $request->status]);

        if ($request->status == 'selesai') {
            $transaksi->motor->update(['status' => 'tersedia']);
        }

        return redirect()->route('transaksi.index')->with('success', 'Status transaksi diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi dihapus');
    }
}
