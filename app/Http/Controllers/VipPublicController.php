<?php

namespace App\Http\Controllers;

use App\Models\JadwalVip;
use Carbon\Carbon;

class VipPublicController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $jadwal = JadwalVip::whereDate('tanggal', $today)
            ->where('status', 'Terjadwal')
            ->orderBy('mulai')
            ->get();

        return view('public.vip', compact('jadwal'));
    }
}
