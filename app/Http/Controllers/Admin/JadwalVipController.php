<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalVip;
use Illuminate\Http\Request;

class JadwalVipController extends Controller
{
    public function index()
    {
        $jadwal = JadwalVip::orderBy('tanggal')
            ->orderBy('mulai')
            ->get();

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'tanggal' => 'required|date',
        'mulai' => 'required',
        'selesai' => 'required',
        'media' => 'required',
        'tamu' => 'required',
        'pic' => 'nullable|string',
        'keterangan' => 'required|string',
    ]);

    $data['status'] = 'Terjadwal';

    JadwalVip::create($data);

    return redirect()
        ->route('admin.jadwal.index')
        ->with('success', 'Jadwal berhasil ditambahkan');
}



    public function edit(JadwalVip $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, JadwalVip $jadwal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'mulai' => 'required',
            'selesai' => 'required',
            'media' => 'required',
            'tamu' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(JadwalVip $jadwal)
    {
        $jadwal->delete();

        return back()->with('success', 'Jadwal dihapus');
    }

    public function updateStatus(Request $request, JadwalVip $jadwal)
{
    $request->validate([
        'status' => 'required|in:Terjadwal,Dibatalkan'
    ]);

    $jadwal->update([
        'status' => $request->status
    ]);

    return back();
}

}
