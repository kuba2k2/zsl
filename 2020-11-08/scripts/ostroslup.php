<?php
	function ostroslup_pole($a, $h) {
		$bh = sqrt(pow($a/2, 2) + pow($h, 2));
		return pow($a, 2) + 2*$a*$bh;
	}

	function ostroslup_objetosc($a, $h) {
		return pow($a, 2)*$h/3;
	}

