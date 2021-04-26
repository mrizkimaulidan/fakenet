<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportRecapController extends Controller
{
    /**
     * Rekapitulasi pendapatan dari tahun Januari-Desember berdasarkan tahun.
     * Intinya method ini menghitung berapa pendapatan di setiap bulan.
     * 
     * @param string $year adalah tahun transaksi,
     * @return Excel menghasilkan file excel.
     */
    public function __invoke(string $year)
    {
        $months = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];

        foreach ($months as $key => $month) {
            $transaction_amount = Transaction::select('month', 'year')->where('month', ($key + 1))->where('year', $year)->sum('amount');

            $result[$month] = $transaction_amount;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->mergeCells('A15:B15')->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'REKAPITULASI PENDAPATAN TAHUN ' . $year);
        $sheet->setCellValue('A2', 'NO');
        $sheet->setCellValue('B2', 'BULAN');
        $sheet->setCellValue('C2', 'TOTAL');
        $sheet->setCellValue('A15', 'TOTAL');

        foreach (range('A', 'C') as $paragraph) {
            $sheet->getColumnDimension($paragraph)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        $cell = 3;
        $no = 1;
        foreach ($result as $key => $row) {
            $sheet->setCellValue('A' . $cell, $no);
            $sheet->setCellValue('B' . $cell, $key);
            $sheet->setCellValue('C' . $cell, $row);
            $cell++;
            $no++;
            $sheet->getStyle('A1:C' . $cell)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN
                    ]
                ]
            ]);
        }

        $sum = 'C3:C' . ($cell - 1);
        $sheet->setCellValue('C15', '=SUM(' . $sum . ')');

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="REKAPITULASI PENDAPATAN_' . $year . '".xlsx');
        $writer->save('php://output');
        exit();
    }
}
