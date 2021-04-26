<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportDuesController extends Controller
{
    /**
     * Menghitung iuran pada database dengan.
     *
     * @param string $year adalah tahun setiap transaksi yang telah dilakukan.
     * @return Excel menghasilkan file excel.
     */
    public function __invoke(string $year)
    {
        $transactions = Transaction::with('client:id,internet_package_id,name,ip_address,address,phone_number', 'client.internet_package:id,name,price')
            ->select('client_id', 'day', 'year')->where('year', $year)->orderBy('day')->get()->unique('client_id');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->mergeCells('A1:E1')->mergeCells('I3:T3');
        $sheet->setCellValue('A1', 'DAFTAR IURAN FAKE.NET TAHUN ' . $year);
        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NAMA');
        $sheet->setCellValue('C3', 'IP ADDRESS');
        $sheet->setCellValue('D3', 'TANGGAL');
        $sheet->setCellValue('E3', 'ALAMAT');
        $sheet->setCellValue('F3', 'KONTAK');
        $sheet->setCellValue('G3', 'PAKET');
        $sheet->setCellValue('H3', 'PERBULAN');
        $sheet->setCellValue('I3', 'BULAN');
        $sheet->getStyle('A:T')->getAlignment()->setHorizontal('center');

        foreach (range('A', 'T') as $paragraph) {
            $sheet->getColumnDimension($paragraph)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        $months = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];

        foreach (range('I', 'T') as $key => $paragraph) {
            $sheet->setCellValue($paragraph . 4, $months[$key]);
        }

        $cell = 5;
        $no = 1;
        foreach ($transactions as $key => $row) {
            $sheet->setCellValue('A' . $cell, $no);
            $sheet->setCellValue('B' . $cell, $row->client->name);
            $sheet->setCellValue('C' . $cell, $row->client->ip_address);
            $sheet->setCellValue('D' . $cell, $row->day);
            $sheet->setCellValue('E' . $cell, $row->client->address);
            $sheet->setCellValue('F' . $cell, $row->client->phone_number);
            $sheet->setCellValue('G' . $cell, $row->client->internet_package->name);
            $sheet->setCellValue('H' . $cell, $row->client->internet_package->price);

            foreach (range('I', 'T') as $key => $paragraph) {
                $transactions_by_user_id = Transaction::with('client')->select('client_id', 'month', 'year', 'amount')->where('client_id', $row->client_id)->where('month', sprintf('%02d', $key + 1))->where('year', $year)->get();

                foreach ($transactions_by_user_id as $key => $transaction_by_user_id) {
                    $sheet->setCellValue($paragraph . $cell, $transaction_by_user_id->amount);
                }
            }

            $cell++;
            $no++;
            $sheet->getStyle('A3:T' . ($cell - 1))->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN
                    ]
                ]
            ]);
        }

        foreach (range('I', 'T') as $key => $paragraph) {
            $sum = '=SUM(' . $paragraph . 5 . ':' . $paragraph . ($cell - 1) . ')';

            $sheet->setCellValue($paragraph . $cell, $sum);
        }

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="IURAN REKAPITULASI_' . $year . '".xlsx');
        $writer->save('php://output');
        exit();
    }
}
