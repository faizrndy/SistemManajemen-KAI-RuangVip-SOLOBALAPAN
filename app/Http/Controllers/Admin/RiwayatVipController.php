<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalVip;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatVipController extends Controller
{
    /**
     * QUERY RIWAYAT (DIPAKAI WEB & PDF)
     */
    private function getRiwayatFiltered()
    {
        $bulan = request('bulan'); // 1 - 12
        $tahun = request('tahun'); // 2026

        $query = JadwalVip::query();

        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        return $query
            ->orderBy('tanggal', 'asc')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->tanggal)
                    ->translatedFormat('F Y');
            });
    }

    /**
     * HALAMAN RIWAYAT (WEB)
     */
    public function index()
    {
        $riwayat = $this->getRiwayatFiltered();

        return view('admin.riwayat.index', compact('riwayat'));
    }

    /**
     * DOWNLOAD RIWAYAT (PDF)
     */
    public function pdf()
    {
        $riwayat = $this->getRiwayatFiltered();

        $pdf = Pdf::loadView('admin.riwayat.pdf', compact('riwayat'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('Laporan_Riwayat_Ruang_VIP.pdf');
    }
}
