<?php
	function prostopadloscian_pole($a, $b, $c) {
		return 2*($a*$b + $a*$c + $b*$c);
	}

	function prostopadloscian_objetosc($a, $b, $c) {
		return $a*$b*$c;
	}

	function prostopadloscian_przekatna($a, $b, $c) {
		return sqrt(pow($a, 2) + pow($b, 2) + pow($c, 2));
	}

