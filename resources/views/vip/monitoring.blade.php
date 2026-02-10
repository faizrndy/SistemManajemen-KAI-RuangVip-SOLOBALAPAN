<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>VIP Room Monitoring</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <meta http-equiv="refresh" content="60">

  <!-- ================= BLINK STYLE ================= -->
  <style>
    @keyframes blinkYellow {
      0%, 100% {
        background-color: #FFFDE7; /* putih kekuningan */
      }
      50% {
        background-color: #f7f200; /* kuning lembut */
      }
    }

    .blink-row {
      animation: blinkYellow 1.5s infinite ease-in-out;
    }
  </style>
</head>

<body class="bg-[#F3F6FB] overflow-hidden text-gray-800">

<!-- ================= HEADER ================= -->
<div class="px-8 pt-6">
  <div class="relative bg-gradient-to-r from-[#1F3C88] to-[#2F55B0]
              rounded-2xl shadow-2xl px-10 py-6 flex items-center justify-between">

    <div class="absolute top-0 left-0 w-full h-2 bg-[#F37021] rounded-t-2xl"></div>

    <div class="flex items-center gap-6 text-white">
      <img src="{{ asset('logo-kai.png') }}" class="h-16 w-auto">
      <div>
        <h1 class="text-3xl font-extrabold tracking-wide">
          PENJAGAAN RUANG VIP JOGLO SOLOBALAPAN
        </h1>
        <p class="text-sm text-white/80 mt-1">
          PT. Kereta Api Indonesia (Persero)
        </p>
      </div>
    </div>

    <div class="text-right text-white min-w-[220px]">
      <div id="clock" class="text-6xl font-extrabold tracking-widest">
        00.00
      </div>
      <div id="date" class="text-sm opacity-80 mt-1">
        -
      </div>
    </div>
  </div>
</div>

<!-- ================= CONTENT ================= -->
<main class="px-8 py-6">

  <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

    <!-- CARD HEADER -->
    <div class="bg-gradient-to-r from-[#1F3C88] to-[#2F55B0]
                px-8 py-4 border-b-4 border-[#F37021]">
      <h2 class="text-2xl font-bold text-white tracking-wide">
        Jadwal Aktif Ruang VIP
      </h2>
      <p class="text-white/80 text-sm mt-1">
        {{ now()->translatedFormat('F Y') }}
      </p>
    </div>

    <!-- TABLE -->
    <table class="w-full border-collapse">

      <thead class="bg-[#F37021]">
        <tr>
          <th class="px-6 py-4 text-white text-xl text-left">Tanggal</th>
          <th class="px-6 py-4 text-white text-xl text-left">Mulai</th>
          <th class="px-6 py-4 text-white text-xl text-left">Selesai</th>
          <th class="px-6 py-4 text-white text-xl text-left">Media</th>
          <th class="px-6 py-4 text-white text-xl text-left">Tamu</th>
          <th class="px-6 py-4 text-white text-xl text-left">Keterangan</th>
          <th class="px-6 py-4 text-white text-xl text-center">Status</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200 font-semibold">

        @php $currentMonth = null; @endphp

        @foreach ($jadwal as $item)

          @if ($currentMonth !== $item->tanggal->format('Y-m'))
            <tr class="bg-[#EDF2FF]">
              <td colspan="7"
                  class="px-6 py-3 text-xl font-bold text-[#1F3C88]">
                📅 {{ $item->tanggal->translatedFormat('F Y') }}
              </td>
            </tr>
            @php $currentMonth = $item->tanggal->format('Y-m'); @endphp
          @endif

          @php $isToday = $item->tanggal->isToday(); @endphp

          <!-- ================= ROW ================= -->
          <tr class="h-24
            {{ $loop->first ? 'blink-row' : '' }}
            {{ $isToday ? 'ring-2 ring-orange-300' : 'bg-white' }}">

            <!-- TANGGAL -->
            <td class="px-6">
              <div class="text-2xl font-extrabold">
                {{ $item->tanggal->format('d') }}
              </div>
              <div class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                {{ $item->tanggal->translatedFormat('M') }}
              </div>
            </td>

            <td class="px-6 text-2xl">
              {{ substr($item->mulai,0,5) }}
            </td>

            <td class="px-6 text-2xl">
              {{ substr($item->selesai,0,5) }}
            </td>

            <td class="px-6">
              <span class="px-5 py-2 rounded-full text-lg font-bold
                {{ $item->media === 'Offline'
                  ? 'bg-orange-200 text-orange-800'
                  : 'bg-purple-200 text-purple-800' }}">
                {{ $item->media }}
              </span>
            </td>

            <td class="px-6 text-2xl">
              {{ $item->tamu }}
            </td>

            <td class="px-6">
              <div class="text-xl leading-snug max-w-[420px]
                          overflow-hidden text-ellipsis
                          line-clamp-2">
                {{ $item->keterangan }}
              </div>
            </td>

            <td class="px-6 text-center">
              @if ($item->status === 'Dibatalkan')
                <span class="px-6 py-2 text-xl font-bold rounded-full
                             bg-red-600 text-white">
                  DIBATALKAN
                </span>
              @elseif ($isToday)
                <span class="px-6 py-2 text-xl font-bold rounded-full
                             bg-orange-500 text-white">
                  BERLANGSUNG
                </span>
              @else
                <span class="px-6 py-2 text-xl font-bold rounded-full
                             bg-blue-600 text-white">
                  TERJADWAL
                </span>
              @endif
            </td>

          </tr>

        @endforeach

      </tbody>
    </table>
  </div>
</main>

<!-- ================= CLOCK ================= -->
<script>
  function updateClock() {
    const now = new Date();
    document.getElementById('clock').innerText =
      now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
      }).replace(':','.');
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
</script>

</body>
</html>
