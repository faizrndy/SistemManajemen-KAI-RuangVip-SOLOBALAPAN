<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
    }

    .header {
      display: flex;
      align-items: center;
      border-bottom: 3px solid #F37021;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .header img {
      height: 45px;
      margin-right: 15px;
    }

    .header-title {
      flex: 1;
      text-align: center;
    }

    h2 {
      margin: 0;
      font-size: 16px;
    }

    .sub {
      font-size: 12px;
      margin-top: 4px;
    }

    .month-title {
      background: #37498c;
      color: #fff;
      padding: 6px 10px;
      margin: 25px 0 10px;
      font-weight: bold;
      font-size: 13px;
      letter-spacing: 1px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    th, td {
      border: 1px solid #000;
      padding: 6px;
    }

    th {
      background: #f2f2f2;
      text-align: center;
    }

    td {
      vertical-align: top;
    }
  </style>
</head>
<body>

  <!-- ===== HEADER PDF ===== -->
  <div class="header">
    <img src="{{ public_path('logo-kai.svg') }}" alt="KAI Logo">
    <div class="header-title">
      <h2>LAPORAN RIWAYAT PENGGUNAAN RUANG VIP JOGLO SOLOBALAPAN</h2>
      <div class="sub">PT Kereta Api Indonesia (Persero)</div>
    </div>
  </div>

  <!-- ===== ISI PER BULAN ===== -->
  @foreach ($riwayat as $bulan => $items)

<div class="month-title">
    {{ strtoupper($bulan) }}
</div>

<table width="100%" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Media</th>
            <th>Tamu</th>
            <th>PIC</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $row)
        <tr>
            <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d/m/Y') }}</td>
            <td>{{ $row->mulai }}</td>
            <td>{{ $row->selesai }}</td>
            <td>{{ $row->media }}</td>
            <td>{{ $row->tamu }}</td>
            <td>{{ $row->pic ?? '-' }}</td>
            <td>{{ $row->keterangan }}</td>
            <td>{{ $row->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endforeach



</body>
</html>
