<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
        .btn-print {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" class="btn-print">Cetak PDF</button>
        <a href="javascript:history.back()" style="margin-left: 10px; color: #666; text-decoration: none;">Kembali</a>
    </div>

    <div class="header">
        <h1>Laporan Data Mahasiswa</h1>
        <p>Aplikasi Nilai Mahasiswa (ANIMA)</p>
        <p>Dicetak pada: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 20%">Nama Mahasiswa</th>
                <th style="width: 15%">Tempat Lahir</th>
                <th style="width: 15%">Tanggal Lahir</th>
                <th style="width: 30%">Alamat</th>
                <th style="width: 15%">No. HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $index => $mhs)
            <tr>
                <td style="text-align: center">{{ $index + 1 }}</td>
                <td>{{ $mhs->nm_mahasiswa }}</td>
                <td>{{ $mhs->tmp_lahir }}</td>
                <td>{{ $mhs->tgl_lahir }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>{{ $mhs->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
