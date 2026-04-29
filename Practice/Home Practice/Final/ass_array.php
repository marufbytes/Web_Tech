<?php

// create array
$a = array("apple", "orange", "banana");

// is_array
var_dump(is_array($a)); // true

// count
echo count($a) . "<br>"; // 3

// in_array
echo in_array("apple", $a) ? "Found<br>" : "Not Found<br>";

// sort
sort($a);
print_r($a);

// rsort
rsort($a);
print_r($a);

// shuffle
shuffle($a);
print_r($a);

// implode
echo implode("|", $a) . "<br>";

// explode
$str = "Mon,Tue,Wed";
$days = explode(",", $str);
print_r($days);

// array_push
array_push($a, "mango", "grape");
print_r($a);

// array_pop
array_pop($a);
print_r($a);

// array_shift
array_shift($a);
print_r($a);

// array_unshift
array_unshift($a, "newFruit");
print_r($a);

// reset & end
echo "First: " . reset($a) . "<br>";
echo "Last: " . end($a) . "<br>";

?>