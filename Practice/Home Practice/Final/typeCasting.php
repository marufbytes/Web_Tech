<!DOCTYPE html>
<html>
<body>

<h2>Cast to Float</h2>

<pre>
<?php
$a = 5;       // Integer
$b = 5.99;    // Float
$c = "25 km"; // String
$d = "km 25"; // String
$e = "hello"; // String
$f = true;    // Boolean
$g = NULL;    // NULL

$a = (string) $a;
$b = (int) $b;
$c = (float) $c;
$d = (float) $d;
$e = (float) $e;
$f = (string) $f;
$g = (float) $g;

echo "<br>";

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
var_dump($f);
var_dump($g);

echo "<br>";

echo print_r($a, true) . "<br>";
echo print_r($b, true) . "<br>";
echo print_r($c, true) . "<br>";
echo print_r($d, true) . "<br>";
echo print_r($e, true) . "<br>";
echo print_r($f, true) . "<br>";
echo print_r($g, true) . "<br>";

echo "<br>";

echo($a)."<br>";
echo($b)."<br>";
echo($c)."<br>";
echo($d)."<br>";
echo($e)."<br>";
echo($f)."<br>";
echo($g)."<br>";

?> 
</pre>

<p>When casting a string that starts with a number, (float) gets that number.</p>
<p>If the string does not start with a number, (float) convert strings to 0.</p>

</body>
</html>
