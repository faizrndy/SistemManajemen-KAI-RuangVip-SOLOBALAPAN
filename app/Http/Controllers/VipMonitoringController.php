<?php

namespace App\Http\Controllers;

use App\Models\JadwalVip;
use Carbon\Carbon;

class VipMonitoringController extends Controller
{
    public function index()
{
    $today = Carbon::today();

    $jadwal = JadwalVip::whereDate('tanggal', '>=', $today)
        ->orderBy('tanggal')
        ->orderBy('mulai')
        ->get();

    return view('vip.monitoring', compact('jadwal'));
}




}
