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
        $bulan = request('bulan');
        $tahun = request('tahun');

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
     * LIST BULAN & TAHUN (UNTUK FILTER)
     */
    private function getFilterOptions()
    {
        $tahunList = JadwalVip::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        $bulanList = JadwalVip::selectRaw('MONTH(tanggal) as bulan')
            ->distinct()
            ->orderBy('bulan')
            ->pluck('bulan');

        return compact('bulanList', 'tahunList');
    }

    /**
     * HALAMAN RIWAYAT (WEB)
     */
    public function index()
    {
        $riwayat = $this->getRiwayatFiltered();
        $filters = $this->getFilterOptions();

        return view('admin.riwayat.index', array_merge(
            compact('riwayat'),
            $filters
        ));
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
