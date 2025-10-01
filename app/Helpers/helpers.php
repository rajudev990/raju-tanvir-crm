<?php

if (!function_exists('numberToOrdinal')) {
    function numberToOrdinal($number)
    {
        $map = [
            1 => 'first',
            2 => 'second',
            3 => 'third',
            4 => 'fourth',
            5 => 'fifth',
            6 => 'sixth',
            7 => 'seventh',
            8 => 'eighth',
            9 => 'ninth',
            10 => 'tenth',
        ];

        return $map[$number] ?? $number . 'th';
    }
}
