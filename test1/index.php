<?php
function indexClosingBracket($exp, $index){
  if ($exp[$index] != '(') {
    return 'Index not at open parenthesis "("';
  }
  $pointer = 1;
  for ($i=$index+1; $i < strlen($exp); $i++) { 
    switch ($exp[$i]) {
      case '(':
        $pointer += 1;
        break;
      case ')':
        $pointer -= 1;
        if($pointer == 0) {
          return $i;
        }
        break;
    }
  }
  return 'No matching closing parenthesis ")"';
}

echo indexClosingBracket("a (b c (d e (f) g) h) i (j k)", 2);