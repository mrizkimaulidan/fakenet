<?php

namespace App\Http\Controllers;

use App\Models\Client;
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

        $sheet->setCellValue('C15', array_sum($result));

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="IURAN REKAPITULASI_' . $year . '".xlsx');
        $writer->save('php://output');
        exit();
    }

    public function listOfDuesExport($year)
    {
        $transactions = Transaction::with('client')->select('client_id', 'day', 'year')->where('year', $year)->orderBy('day')->get()->unique('client_id');

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
            $sum_month = Transaction::select('month', 'year', 'amount')->where('month', sprintf('%02d', $key + 1))->where('year', $year)->sum('amount');

            if ($sum_month === 0) {
                $sum_month = null;
            }

            $sheet->setCellValue($paragraph . $cell, $sum_month);
        }

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="IURAN REKAPITULASI_' . $year . '".xlsx');
        $writer->save('php://output');
        exit();
    }
}
