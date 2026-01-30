<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalVip;

class JadwalVipSeeder extends Seeder
{
    public function run(): void
    {
        JadwalVip::truncate();

        $data = [
            // ================= JANUARI 2026 =================
            [
                'tanggal' => '2026-01-12',
                'mulai' => '11:32',
                'selesai' => '11:33',
                'media' => 'Offline',
                'tamu' => 'Internal',
                'pic' => 'Humas IT DAOP 6',
                'keterangan' => 'Briefing internal',
                'status' => 'Terjadwal',
            ],
            [
                'tanggal' => '2026-01-26',
                'mulai' => '08:00',
                'selesai' => '10:00',
                'media' => 'Offline',
                'tamu' => 'Eksternal',
                'pic' => null,
                'keterangan' => 'Kunjungan pejabat pusat',
                'status' => 'Terjadwal',
            ],

            // ================= FEBRUARI 2026 =================
            [
                'tanggal' => '2026-02-03',
                'mulai' => '09:00',
                'selesai' => '11:00',
                'media' => 'Hybrid',
                'tamu' => 'Internal',
                'pic' => 'Protokoler DAOP 6',
                'keterangan' => 'Koordinasi kegiatan VIP',
                'status' => 'Terjadwal',
            ],
            [
                'tanggal' => '2026-02-15',
                'mulai' => '13:30',
                'selesai' => '15:00',
                'media' => 'Online',
                'tamu' => 'Eksternal',
                'pic' => 'Humas DAOP 6',
                'keterangan' => 'Meeting dengan stakeholder',
                'status' => 'Dibatalkan',
            ],

            // ================= MARET 2026 =================
            [
                'tanggal' => '2026-03-05',
                'mulai' => '08:30',
                'selesai' => '10:30',
                'media' => 'Offline',
                'tamu' => 'Eksternal',
                'pic' => 'Tim Acara',
                'keterangan' => 'Kunjungan instansi daerah',
                'status' => 'Terjadwal',
            ],
            [
                'tanggal' => '2026-03-20',
                'mulai' => '14:00',
                'selesai' => '16:00',
                'media' => 'Hybrid',
                'tamu' => 'Internal',
                'pic' => 'Protokoler',
                'keterangan' => 'Evaluasi penggunaan ruang VIP',
                'status' => 'Terjadwal',
            ],
        ];

        foreach ($data as $item) {
            JadwalVip::create($item);
        }
    }
}
