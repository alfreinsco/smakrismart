<?php

// app/helpers.php

if (!function_exists('selisihTanggal')) {
    function selisihTanggal($tanggal1, $tanggal2 = null)
    {
        // Tentukan tanggal awal dan akhir secara dinamis
        if ($tanggal2 === null) {
            $tanggal2 = date('Y-m-d');
        }

        $start = strtotime($tanggal1);
        $end = strtotime($tanggal2);

        // Jika tanggal awal lebih besar dari tanggal akhir, tukar posisi
        if ($start > $end) {
            list($start, $end) = array($end, $start);
        }

        $selisih = $end - $start;
        $selisihHari = $selisih / (60 * 60 * 24);

        $years = floor($selisihHari / 365);
        $months = floor(($selisihHari % 365) / 30);
        $days = $selisihHari % 30;

        $result = '';
        if ($years > 0) {
            $result .= $years . ' tahun ';
        }
        if ($months > 0) {
            $result .= $months . ' bulan ';
        }
        if ($days > 0) {
            $result .= $days . ' hari';
        }

        return trim($result);
    }
}
