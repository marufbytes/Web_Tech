<?php

$a = array("apple", "orange", "banana");

// is_array
var_dump(is_array($a)); // bool(true)

// count
echo count($a) . "<br>"; // 3

// in_array
echo in_array("apple", $a) ? "Found<br>" : "Not Found<br>"; // Found

// sort
sort($a);
print_r($a); 
// Array ( [0] => apple [1] => banana [2] => orange )

// rsort
rsort($a);
print_r($a);
// Array ( [0] => orange [1] => banana [2] => apple )

// shuffle
shuffle($a);
print_r($a);
// random order (e.g. Array ( [0] => banana [1] => apple [2] => orange ))

// implode
echo implode("|", $a) . "<br>"; 
// banana|apple|orange (random order অনুযায়ী)

// explode
$str = "Mon,Tue,Wed";
$days = explode(",", $str);
print_r($days);
// Array ( [0] => Mon [1] => Tue [2] => Wed )

// array_push
array_push($a, "mango", "grape");
print_r($a);
// Array ( [0] => ... [3] => mango [4] => grape )

// array_pop
array_pop($a);
print_r($a);
// last element removed (grape gone)

// array_shift
array_shift($a);
print_r($a);
// first element removed

// array_unshift
array_unshift($a, "newFruit");
print_r($a);
// newFruit added at beginning

// reset & end
echo "First: " . reset($a) . "<br>"; // First: newFruit
echo "Last: " . end($a) . "<br>";   // Last: (শেষ element)

?>