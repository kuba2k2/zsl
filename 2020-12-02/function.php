<?php
    function oblicz($a, $b) {
        $a = $a + 0.0;
        $b = $b + 0.0;
        return (-$a + sqrt(pow($b, 2) - 2*$a)) / $a;
    }
