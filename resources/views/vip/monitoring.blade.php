<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>VIP Room Monitoring</title>
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- Auto refresh tiap 60 detik (aman buat TV) --}}
  <meta http-equiv="refresh" content="60">
</head>

<body class="bg-[#F5F7FA] overflow-hidden">

  <!-- ================= HEADER TV ================= -->
  <header class="bg-[#37498c] border-b-4 border-[#F37021]">
    <div class="flex items-center px-10 py-6 gap-8">

      <!-- LOGO -->
      <img
        src="{{ asset('logo-kai.png') }}"
        alt="KAI"
        class="h-20 w-auto object-contain"
      >

      <!-- TITLE -->
      <div class="flex-1">
        <h1 class="text-3xl font-bold text-white tracking-wide">
          PENJAGAAN RUANG VIP JOGLO SOLOBALAPAN
        </h1>
        <p class="text-lg text-white/90 mt-1">
          Monitoring Kegiatan & Tamu Ruang VIP
        </p>
      </div>

      <!-- CLOCK -->
      <div class="text-right text-white select-none">
        <div id="clock" class="text-4xl font-extrabold tracking-wide">
          00:00
        </div>
        <div id="date" class="text-sm font-semibold mt-1">
          -
        </div>
      </div>

    </div>
  </header>

  <!-- ================= CONTENT ================= -->
  <main class="px-10 py-6">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden">

      <!-- TABLE TITLE -->
      <div class="bg-[#2C3E7D] px-8 py-4 border-b-4 border-[#F37021]">
        <h2 class="text-2xl text-white font-semibold">
          Daftar Penggunaan Ruang VIP
        </h2>
      </div>

      <!-- TABLE -->
      <table class="w-full border-collapse">
        <thead class="bg-[#F37021]">
          <tr>
            <th class="px-6 py-4 text-lg text-white text-left">Tanggal</th>
            <th class="px-6 py-4 text-lg text-white text-left">Mulai</th>
            <th class="px-6 py-4 text-lg text-white text-left">Selesai</th>
            <th class="px-6 py-4 text-lg text-white text-left">Media</th>
            <th class="px-6 py-4 text-lg text-white text-left">Tamu</th>
            <th class="px-6 py-4 text-lg text-white text-left">Keterangan</th>
            <th class="px-6 py-4 text-lg text-white text-left">Status</th>
          </tr>
        </thead>

        <tbody class="bg-slate-50">
          @foreach ($jadwal as $item)
            <tr class="h-20 border-b border-gray-300">
              <td class="px-6 text-lg">
                {{ $item->tanggal->format('d F Y') }}
              </td>
              <td class="px-6 text-lg">
                {{ substr($item->mulai,0,5) }}
              </td>
              <td class="px-6 text-lg">
                {{ substr($item->selesai,0,5) }}
              </td>
              <td class="px-6 text-lg">
                {{ $item->media }}
              </td>
              <td class="px-6 text-lg">
                {{ $item->tamu }}
              </td>
              <td class="px-6 text-lg">
                {{ $item->keterangan }}
              </td>
              <td class="px-6 text-lg font-semibold">
                @if ($item->status === 'Dibatalkan')
                  <span class="text-red-600">Dibatalkan</span>
                @else
                  <span class="text-green-600">Terjadwal</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </main>

  <!-- ================= CLOCK SCRIPT ================= -->
  <script>
    function updateClock() {
      const now = new Date();
      document.getElementById('clock').innerText =
        now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

      document.getElementById('date').innerText =
        now.toLocaleDateString('id-ID', {
          weekday: 'long',
          day: '2-digit',
          month: 'long',
          year: 'numeric'
        });
    }

    updateClock();
    setInterval(updateClock, 1000);

    // reload tiap 60 detik
    setTimeout(() => {
      location.reload();
    }, 30000);
  </script>


</body>
</html>
