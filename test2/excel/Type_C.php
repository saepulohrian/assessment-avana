<?php
require __DIR__."/../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A1', 'Field_A*')
->setCellValue('B1', 'Field_B')
->setCellValue('C1', '#Field_C')
->setCellValue('D1', 'Field_D*')
->setCellValue('E1', '#Field_E');
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A2', NULL)
->setCellValue('B2', '1')
->setCellValue('C2', '1')
->setCellValue('D2', '1')
->setCellValue('E2', NULL);
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', '1')
->setCellValue('B3', '1')
->setCellValue('C3', '1 1')
->setCellValue('D3', '1')
->setCellValue('E3', '1');
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A4', 1)
->setCellValue('B4', NULL)
->setCellValue('C4', NULL)
->setCellValue('D4', '1')
->setCellValue('E4', NULL);

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Sheet 1');
$spreadsheet->setActiveSheetIndex(0);
$sheetData = $spreadsheet->getActiveSheet()->toArray();
