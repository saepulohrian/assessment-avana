<?php
namespace App;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\ValidateRule;

class ValidateExcel {
  
  public function extract($dir){
    $files = preg_grep("/.*\.(xls|xlsx|php)/", scandir($dir));
    if ($files) {
      foreach ($files as $file) {
        $inputFileName = $dir.'/'.$file;
        echo "<h3>Output validating file ".$file."</h3>";
        if (preg_match("/.*\.(php)/",$file)) {
            include $inputFileName;
        } else {
          $spreadsheet = IOFactory::load($inputFileName);
          $sheetData = $spreadsheet->getActiveSheet()->toArray();
        }
        echo ValidateRule::validation($sheetData);
      }
    }
  }
}