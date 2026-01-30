@extends('admin.layout')

@section('content')
<div class="max-w-5xl mx-auto">

  <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <!-- HEADER -->
    <div class="bg-[#2C3E7D] px-10 py-6 border-b-4 border-[#F37021]">
      <h2 class="text-xl font-semibold text-white tracking-wide">
        Form Input Jadwal VIP
      </h2>
      <p class="text-white/80 text-sm mt-1">
        Pengisian data penggunaan Ruang VIP Joglo
      </p>
    </div>

    <!-- FORM -->
    <form action="{{ route('admin.jadwal.store') }}" method="POST" class="px-10 py-8 space-y-8">
      @csrf

      <input type="hidden" name="status" value="Terjadwal">

      <!-- ROW 1 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="label">Tanggal</label>
          <input
  type="date"
  name="tanggal"
  min="{{ date('Y-m-d') }}"
  class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
  required
>

        </div>

        <div>
          <label class="label">Media</label>
          <select name="media" class="input">
            <option>Offline</option>
            <option>Online</option>
            <option>Hybrid</option>
          </select>
        </div>
      </div>

      <!-- ROW 2 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="label">Waktu Mulai</label>
          <input type="time" name="mulai" required>
        </div>

        <div>
          <label class="label">Waktu Selesai</label>
          <input type="time" name="selesai" required>
        </div>
      </div>

      <!-- ROW 3 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="label">Tamu</label>
          <select name="tamu" class="input">
            <option>Internal</option>
            <option>Eksternal</option>
          </select>
        </div>

        <div>
          <label class="label">PIC</label>
          <input type="text" name="pic" class="input" placeholder="Contoh: Humas DAOP 6">
        </div>
      </div>

      <!-- KETERANGAN -->
      <div>
        <label class="label">Keterangan</label>
        <textarea name="keterangan" rows="3" class="input resize-none"
          placeholder="Contoh: Rapat koordinasi internal"></textarea>
      </div>

      <!-- ACTION -->
      <div class="flex justify-end gap-4 pt-6 border-t">
        <a href="{{ route('admin.jadwal.index') }}"
           class="px-6 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
          Batal
        </a>

        <button type="submit"
          class="px-6 py-2 rounded-lg bg-[#2C3E7D] text-white hover:bg-[#24336A]">
          Simpan Jadwal
        </button>
      </div>

    </form>
  </div>
</div>

<style>
.label{
  font-size: 0.85rem;
  font-weight: 600;
  margin-bottom: 4px;
  display: block;
}
.input{
  width: 100%;
  border: 1px solid #cbd5e1;
  border-radius: 10px;
  padding: 10px 14px;
  font-size: 0.9rem;
}
.input:focus{
  outline: none;
  border-color: #2C3E7D;
  box-shadow: 0 0 0 2px rgba(44,62,125,.15);
}
</style>
@endsection
