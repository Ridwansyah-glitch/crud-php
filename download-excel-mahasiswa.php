<?php

require 'config/app.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No')->getColumnDimension('A')->setAutoSize(true);
$sheet->setCellValue('B2', 'Nama')->getColumnDimension('B')->setAutoSize(true);
$sheet->setCellValue('C2', 'Program Studi')->getColumnDimension('C')->setAutoSize(true);
$sheet->setCellValue('D2', 'Jenis Kelamin')->getColumnDimension('D')->setAutoSize(true);
$sheet->setCellValue('E2', 'Telepon')->getColumnDimension('E')->setAutoSize(true);
$sheet->setCellValue('F2', 'Email')->getColumnDimension('F')->setAutoSize(true);


//ambil data
$data_mahasiswa =query("SELECT * FROM mahasiswa");

$no =1;

//data dimulai dari baris ke
$start =3;

foreach ($data_mahasiswa as $mahasiswa) {
    $sheet->setCellValue('A'.$start,$no++);
    $sheet->setCellValue('B'.$start,$mahasiswa['nama']);
    $sheet->setCellValue('C'.$start,$mahasiswa['prodi']);
    $sheet->setCellValue('D'.$start,$mahasiswa['jk']);
    $sheet->setCellValue('E'.$start,$mahasiswa['telepon']);
    $sheet->setCellValue('F'.$start,$mahasiswa['email']);

    $start++;
}


$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000'],
        ],
    ],
];


$sheet->getStyle('A2:F5')->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Data Mahasiswa.xlsx');
header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition:attachment;filename="Laporan Data Mahasiswa.xlsx"');
readfile('Laporan Data Mahasiswa.xlsx');
unlink('Laporan Data Mahasiswa.xlsx');
exit;
