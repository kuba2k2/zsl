<?php

$x = 'hello world! goodbye world! to jest tekst pisany malymi literami tylko';

echo strtoupper($x[0]) . substr($x, 1).'<br>';
echo implode(' ', array_map(function($a){return strtoupper($a[0]) . substr($a, 1);}, explode(' ', $x))).'<br>';
echo strtoupper($x);
echo'<pre>';
echo implode('<br>', str_split($x, 20));
echo '</pre>';
