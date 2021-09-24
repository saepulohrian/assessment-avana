<?php
namespace App;

class ValidateRule {
	public function rule($theads) {
		$rule = [];
		foreach ($theads as $i => $thead) {
			if ($thead[0] == "#" && substr($thead,-1) == "*") {
				$rule[$i] = 1;
			} else if($thead[0] == "#") {
				$rule[$i] = 2;
			} else if (substr($thead,-1) == "*"){
				$rule[$i] = 3;
			} else {
				$rule[$i] = 4;
			}
		}
		return $rule;
	}
	
	public function validation($sheetData){
		$result = "";
		$result .= '<table border="1" style="border-collapse: collapse;">';
		$result .= '<tr style="background: #b7b7b7"><th style="padding: 5px;text-align: left;">Row</th><th style="padding: 5px;text-align: left;">Error</th></tr>';
		foreach ($sheetData as $i => $values) {
			$theads = $sheetData[0];
			$rule = ValidateRule::rule($theads);
			if ($i > 0) {
				$errors = [];
				foreach ($values as $key => $item) {
					$thead = str_replace(array("#","*"),"",$theads[$key]);
					if ($rule[$key] == 1 && (is_null($item) || preg_match("/ /",$item))) {
						$errors[$key] = $thead." missing value and should not contain any space";
					} else if($rule[$key] == 2 && preg_match("/ /", $item)) {
						$errors[$key] = $thead." should not contain any space";
					} else if($rule[$key] == 3 && is_null($item)) {
						$errors[$key] = "Missing value in ".$thead;
					}
				}
				$i +=  1;
				$errors = implode($errors, ', ');
				if($errors) {
					$result .= "<tr><td style='padding: 5px;'>{$i}</td><td style='padding: 5px;'>{$errors}</td></tr>";
				}
			}
		}
		$result .= "</table><br>";
		return $result;
	}
}