<?php
session_start();
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('Harus Login Dahulu!!!');
        document.location.href = 'login.php';
      </script>";
  exit;
}
// membatasi halaman login sesuai login
if ($_SESSION["level"] != 1 and $_SESSION["level"] !=3) {
  echo "<script>
        alert('TIdak memiliki akses!!!');
        document.location.href = 'index.php';
      </script>";
  exit;
}


require 'config/app.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Nama');
$sheet->setCellValue('C2', 'Program Studi');
$sheet->setCellValue('D2', 'Jenis Kelamin');
$sheet->setCellValue('E2', 'Telepon');
$sheet->setCellValue('F2', 'Email');
$sheet->setCellValue('G2', 'Foto');

$data_mahasiswa = select("SELECT * FROM mahasiswa");
$no=1;
$start=3;

foreach ($data_mahasiswa as $mahasiswa){
    $sheet->setCellValue('A' . $start , $no++)->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('B' . $start , $mahasiswa['nama'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start , $mahasiswa['prodi'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start , $mahasiswa['jk'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start , $mahasiswa['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start , $mahasiswa['email'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start , 'http://localhost/CRUD-belajar/assets/img/'.$mahasiswa['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;
}

//boreder table
$styleArray = [
  'borders' => [
      'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      ],
  ],
];

$border = $start -1;
$sheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan-data-mahasiswa.xlsx');

ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attacment;filename="Laporan-data-mahasiswa.xlsx"');
readfile('Laporan-data-mahasiswa.xlsx');
unlink('Laporan-data-mahasiswa.xlsx');
exit;