<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!session()->has('admin')) {
            redirect('/login')->send();
        }
    }

    public function index()
    {
        $totalMotor = Motor::count();
        $motorTersedia = Motor::where('status', 'tersedia')->count();
        $motorDipinjam = Motor::where('status', 'dipinjam')->count();

        $totalTransaksi = Transaksi::count();
        $transaksiBerlangsung = Transaksi::where('status', 'berlangsung')->count();
        $transaksiSelesai = Transaksi::where('status', 'selesai')->count();

        return view('dashboard', compact(
            'totalMotor',
            'motorTersedia',
            'motorDipinjam',
            'totalTransaksi',
            'transaksiBerlangsung',
            'transaksiSelesai'
        ));
    }
}
