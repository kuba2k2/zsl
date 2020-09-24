<?php
//wersja php
echo  PHP_VERSION;
//phpinfo();

$x = 10;
$y = 20;
echo $x <=> $y;

if ($x==$y) {
echo 'Zmienne są równe';
}
else {
echo 'Zmienne są różne';
}

$x = 2;
echo $x++; // 2
echo ++$x; // 4
echo $x; // 4
$y = $x++;
echo $y; // 4
$y = ++$x; // 6
echo $y; // 6
echo ++$y; // 7

echo '<hr>';

$test2 = 20;
echo "<p>$test2</p>";
$test2 = (unset)$test2;
echo gettype($test2);
unset($test2);
echo gettype($test2);

