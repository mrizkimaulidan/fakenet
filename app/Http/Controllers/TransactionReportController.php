<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Repositories\TransactionReportRepository;

class TransactionReportController extends Controller
{
    public function __construct(
        private TransactionReportRepository $transactionReportRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions_this_month = $this->transactionReportRepository->getTransactionsBy(month: date('m'));
        $transactions_this_year = $this->transactionReportRepository->getTransactionsBy(year: date('Y'));

        return view('reports.transactions.index', compact('transactions_this_month', 'transactions_this_year'));
    }

    public function export($year)
    {
        $months = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];

        foreach ($months as $key => $month) {
            $transaction_amount = Transaction::where('month', ($key + 1))->where('year', $year)->sum('amount');

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

        $sheet->setCellValue('C15', array_sum($result));

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="IURAN REKAPITULASI_' . $year . '".xlsx');
        $writer->save('php://output');
        exit();
    }
}
