<?php

namespace App\Http\Controllers;

use App\Models\JadwalVip;
use Carbon\Carbon;


class VipMonitoringController extends Controller
{
    public function index()
{
    $today = Carbon::today();

    $jadwal = JadwalVip::whereDate('tanggal', '>=', Carbon::today())
    ->orderBy('tanggal', 'asc')
    ->orderBy('mulai', 'asc')
    ->take(5)
    ->get();

    return view('vip.monitoring', compact('jadwal'));
}




}
