<?php

require __DIR__."/vendor/autoload.php";
use App\ValidateExcel;

//call function validate excel with passing name folder excel file (excel)  as parameter.
ValidateExcel::extract('excel');