<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin VIP</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA] min-h-screen">

<div class="flex min-h-screen">

  <!-- ========== SIDEBAR ========== -->
  <aside class="w-64 bg-[#1F2A5A] text-white flex flex-col">

    <!-- LOGO -->
    <div class="px-6 py-6 border-b border-white/20 flex items-center gap-3">
        <img
          src="{{ asset('logo-kai.png') }}"
          alt="PT Kereta Api Indonesia"
          class="h-9 w-auto object-contain"
        >

        <div class="text-xs uppercase tracking-widest text-white/70 leading-tight">
          PT Kereta Api Indonesia
        </div>
      </div>



    <!-- MENU -->
    <nav class="flex-1 px-4 py-6 space-y-1 text-sm">

      <a href="{{ route('admin.jadwal.index') }}"
         class="block px-4 py-3 rounded
         {{ request()->routeIs('admin.jadwal.index')
            ? 'bg-white/15 font-semibold'
            : 'hover:bg-white/10' }}">
        Dashboard Jadwal
      </a>

      <a href="{{ route('admin.jadwal.create') }}"
         class="block px-4 py-3 rounded
         {{ request()->routeIs('admin.jadwal.create')
            ? 'bg-white/15 font-semibold'
            : 'hover:bg-white/10' }}">
        Input Jadwal
      </a>

      <a href="{{ route('admin.riwayat.index') }}"
         class="block px-4 py-3 rounded
         {{ request()->routeIs('admin.riwayat.*')
            ? 'bg-white/15 font-semibold'
            : 'hover:bg-white/10' }}">
        Riwayat Penggunaan
      </a>

    </nav>

    <!-- FOOTER SIDEBAR -->
    <div class="px-6 py-4 border-t border-white/20 text-xs text-white/70">
      Sistem Monitoring Ruang VIP<br>
      PT KAI (Persero)
    </div>

  </aside>

  <!-- ========== MAIN AREA ========== -->
  <div class="flex-1 flex flex-col">

    <!-- HEADER ATAS -->
    <header class="bg-[#37498c] border-b-4 border-[#F37021]">
      <div class="px-10 py-6 flex items-center justify-between">

        <!-- TITLE -->
        <div>
          <h1 class="text-3xl font-bold text-white tracking-wide uppercase">
            Admin Pengelolaan Ruang VIP
          </h1>
          <p class="text-white/90 mt-1">
            Ruang VIP Joglo – Stasiun Solo Balapan
          </p>
        </div>

        <!-- USER + LOGOUT -->
        <div class="flex items-center gap-4">

          <!-- USER INFO -->
          <div class="text-right">
            <div class="text-sm font-semibold text-white">
              {{ auth()->user()->name ?? 'Admin' }}
            </div>
            <div class="text-xs text-white/70">
              {{ auth()->user()->email ?? '' }}
            </div>
          </div>

          <!-- LOGOUT -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
              type="submit"
              class="flex items-center gap-2 px-4 py-2
                     border border-white/70
                     text-white text-sm font-semibold
                     rounded-lg
                     hover:bg-white hover:text-[#37498c]
                     transition">
              <!-- ICON -->
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-4 w-4"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m-7 0h4a2 2 0 012 2v10a2 2 0 01-2 2H6" />
              </svg>
              Logout
            </button>
          </form>

        </div>
      </div>
    </header>

    <!-- PAGE CONTENT -->
    <main class="px-10 py-8 flex-1">
      @yield('content')
    </main>

  </div>

</div>

</body>
</html>
