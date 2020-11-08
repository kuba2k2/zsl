<?php
	function walec_pole_podst($r) {
		return pi()*pow($r, 2);
	}

	function walec_pole_pb($r, $h) {
		return 2*pi()*$r*$h;
	}

	function walec_pole_pc($r, $h) {
		return walec_pole_podst($r) + walec_pole_pb($r, $h);
	}

	function walec_objetosc($r, $h) {
		return walec_pole_podst($r)*$h;
	}

