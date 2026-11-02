<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('tgl_indo')) {
    function tgl_indo($datetime, $with_time = true) {
        if (empty($datetime) || $datetime == '0000-00-00 00:00:00' || $datetime == '0000-00-00') {
            return '-';
        }

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $time = strtotime($datetime);
        $tgl = date('d', $time);
        $bln = $bulan[(int)date('m', $time)];
        $thn = date('Y', $time);

        if ($with_time) {
            $jam = date('H:i', $time);
            return "$tgl $bln $thn, $jam WIB";
        }

        return "$tgl $bln $thn";
    }
}
