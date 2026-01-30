<div class="max-w-xl bg-white rounded-xl shadow p-6">

    <h2 class="text-xl font-bold mb-4">
      Form Input Jadwal Ruang VIP
    </h2>

    <form method="POST" action="{{ $action }}">
      @csrf
      @if($method !== 'POST') @method($method) @endif

      <label class="block mb-1">Tanggal</label>
      <input type="date" name="tanggal" class="input"
        value="{{ old('tanggal',$jadwal->tanggal ?? '') }}">

      <label class="block mb-1">Waktu Mulai</label>
      <input type="time" name="mulai" class="input"
        value="{{ old('mulai',$jadwal->mulai ?? '') }}">

      <label class="block mb-1">Waktu Selesai</label>
      <input type="time" name="selesai" class="input"
        value="{{ old('selesai',$jadwal->selesai ?? '') }}">

      <label class="block mb-1">Media</label>
      <select name="media" class="input">
        @foreach(['Online','Offline','Hybrid'] as $m)
          <option @selected(($jadwal->media ?? '')==$m)>
            {{ $m }}
          </option>
        @endforeach
      </select>

      <label class="block mb-1">Tamu</label>
      <select name="tamu" class="input">
        @foreach(['Internal','Eksternal'] as $t)
          <option @selected(($jadwal->tamu ?? '')==$t)>
            {{ $t }}
          </option>
        @endforeach
      </select>

      <label class="block mb-1">PIC</label>
      <input type="text" name="pic" class="input"
        placeholder="Contoh: Humas DAOP 6"
        value="{{ old('pic',$jadwal->pic ?? '') }}">

      <label class="block mb-1">Keterangan</label>
      <input type="text" name="keterangan" class="input"
        value="{{ old('keterangan',$jadwal->keterangan ?? '') }}">

      <!-- STATUS OTOMATIS -->
      <input type="hidden" name="status" value="Terjadwal">

      <div class="mt-6 flex gap-3">
        <button class="bg-[#37498c] text-white px-4 py-2 rounded">
          Simpan
        </button>
        <a href="{{ route('admin.jadwal.index') }}" class="px-4 py-2">
          Kembali
        </a>
      </div>

    </form>
  </div>

  <style>
  .input{
    width:100%;
    border:1px solid #cbd5e1;
    padding:8px;
    margin-bottom:12px;
    border-radius:6px;
  }
  </style>
