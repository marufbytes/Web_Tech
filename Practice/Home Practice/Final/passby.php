<?php
function funByRef($v1, &$v2) {
  $v1 = $v1 * 2;
  $v2 = $v2 * 2;

  var_dump($v1); // int(6)
  var_dump($v2); // int(10)
}

$a = 3;
$b = 5;

funByRef($a, $b);

var_dump($a); // int(3)
var_dump($b); // int(10)
?>