@extends('admin.layout')


@section('content')

<div class="max-w-7xl mx-auto">

    <!-- ================= CARD RIWAYAT ================= -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <!-- HEADER CARD -->
        <div class="bg-[#2C3E7D] text-white px-6 py-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold">
                Riwayat Penggunaan Ruang VIP JOGLO SOLOBALAPAN
            </h2>

            <!-- PDF ikut filter -->
            <a href="{{ route('admin.riwayat.pdf', request()->query()) }}"
               class="bg-white text-[#2C3E7D] px-4 py-2 rounded-lg font-semibold hover:bg-gray-100">
                Download PDF
            </a>
        </div>

        <!-- FILTER -->
        <div class="px-6 py-4 border-b bg-gray-50">
            <form method="GET" class="flex flex-wrap gap-4 items-end">

                <!-- BULAN -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Bulan</label>
                    <select name="bulan" class="border rounded-lg px-3 py-2 min-w-[160px]">
                        <option value="">Semua</option>
                        @foreach(range(1,12) as $b)
                            <option value="{{ $b }}"
                                {{ request('bulan') == $b ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- TAHUN -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun</label>
                    <select name="tahun" class="border rounded-lg px-3 py-2 min-w-[120px]">
                        <option value="">Semua</option>
                        @for ($y = now()->year; $y >= now()->year - 5; $y--)
                            <option value="{{ $y }}"
                                {{ request('tahun') == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>

                <!-- BUTTON -->
                <div>
                    <button
                        type="submit"
                        class="px-6 py-2 bg-[#2C3E7D] text-white rounded-lg hover:bg-[#24336A]">
                        Terapkan
                    </button>
                </div>

            </form>
        </div>

        <!-- ================= DATA ================= -->
        <div class="px-6 py-6 space-y-8">

            @forelse($riwayat as $bulanTahun => $items)

                <!-- HEADER BULAN -->
                <div>
                    <div class="bg-[#2C3E7D] text-white px-4 py-2 rounded-t-lg font-semibold uppercase tracking-wide text-sm">
                        {{ strtoupper($bulanTahun) }}
                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto border border-t-0 rounded-b-lg">
                        <table class="min-w-full text-sm">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">Tanggal</th>
                                    <th class="px-3 py-2 border">Mulai</th>
                                    <th class="px-3 py-2 border">Selesai</th>
                                    <th class="px-3 py-2 border">Media</th>
                                    <th class="px-3 py-2 border">Tamu</th>
                                    <th class="px-3 py-2 border">PIC</th>
                                    <th class="px-3 py-2 border">Keterangan</th>
                                    <th class="px-3 py-2 border">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($items as $row)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 border text-center">
                                        {{ \Carbon\Carbon::parse($row->tanggal)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        {{ $row->mulai }}
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        {{ $row->selesai }}
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        {{ $row->media }}
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        {{ $row->tamu }}
                                    </td>
                                    <td class="px-3 py-2 border">
                                        {{ $row->pic ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border">
                                        {{ $row->keterangan }}
                                    </td>
                                    <td class="px-3 py-2 border text-center font-semibold
                                        {{ $row->status === 'Dibatalkan' ? 'text-red-600' : 'text-green-600' }}">
                                        {{ $row->status }}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            @empty
                <div class="text-center text-gray-500 py-10">
                    Tidak ada data riwayat.
                </div>
            @endforelse

        </div>
    </div>
</div>

@endsection
