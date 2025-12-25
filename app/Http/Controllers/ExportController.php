<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class ExportController extends Controller
{
    public function exportCsv()
    {
        $filename = 'data-mahasiswa-' . date('Y-m-d') . '.csv';
        $mahasiswa = MahasiswaModel::all();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'Nama Mahasiswa', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'No HP'];

        $callback = function() use($mahasiswa, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($mahasiswa as $index => $row) {
                fputcsv($file, [
                    $index + 1,
                    $row->nm_mahasiswa,
                    $row->tmp_lahir,
                    $row->tgl_lahir,
                    $row->alamat,
                    $row->no_hp
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function printPdf()
    {
        $mahasiswa = MahasiswaModel::all();
        return view('print_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
}
