@extends('admin.layout')

@section('content')
<div class="bg-white rounded-xl shadow-xl overflow-hidden">

  <!-- CARD HEADER (TANPA TOMBOL TAMBAH) -->
  <div class="bg-[#2C3E7D] px-8 py-4 border-b-4 border-[#F37021]">
    <h2 class="text-2xl text-white font-semibold">
        Daftar Jadwal Penggunaan Ruang VIP

    </h2>
  </div>

  <!-- TABLE -->
  <table class="w-full border-collapse">
    <thead class="bg-[#F37021]">
      <tr>
        <th class="px-4 py-4 text-white text-left">Tanggal</th>
        <th class="px-4 py-4 text-white">Mulai</th>
        <th class="px-4 py-4 text-white">Selesai</th>
        <th class="px-4 py-4 text-white">Media</th>
        <th class="px-4 py-4 text-white">Tamu</th>
        <th class="px-4 py-4 text-white">PIC</th>
        <th class="px-4 py-4 text-white">Keterangan</th>
        <th class="px-4 py-4 text-white">Status</th>
      </tr>
    </thead>

    <tbody class="bg-slate-50">
      @foreach($jadwal as $item)
      <tr class="h-20 border-b border-gray-300 hover:bg-slate-200 transition">
        <td class="px-4 text-lg">
          {{ $item->tanggal->format('d F Y') }}
        </td>
        <td class="px-4">{{ substr($item->mulai,0,5) }}</td>
        <td class="px-4">{{ substr($item->selesai,0,5) }}</td>
        <td class="px-4">{{ $item->media }}</td>
        <td class="px-4">{{ $item->tamu }}</td>
        <td class="px-4 font-semibold">
          {{ $item->pic ?? '-' }}
        </td>
        <td class="px-4">{{ $item->keterangan }}</td>

        <!-- STATUS DROPDOWN -->
        <td class="px-4">
          <form
            method="POST"
            action="{{ route('admin.jadwal.updateStatus', $item) }}"
          >
            @csrf
            @method('PATCH')

            <select
              name="status"
              onchange="this.form.submit()"
              class="border rounded px-2 py-1 text-sm
                {{ $item->status === 'Dibatalkan'
                    ? 'text-red-600 border-red-400'
                    : 'text-green-600 border-green-400' }}"
            >
              <option value="Terjadwal"
                @selected($item->status === 'Terjadwal')>
                Terjadwal
              </option>

              <option value="Dibatalkan"
                @selected($item->status === 'Dibatalkan')>
                Dibatalkan
              </option>
            </select>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
