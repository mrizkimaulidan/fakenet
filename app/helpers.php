<?php

if (!function_exists('get_is_paid_status')) {
    /**
     * Mendapatkan status lunas atau belum lunas.
     *
     * @param integer $is_paid jika 1 berarti Lunas, jika 2 berarti Belum Lunas.
     * @return String
     */
    function get_is_paid_status(int $is_paid): String
    {
        return $is_paid === 1 ? 'Lunas' : 'Belum Lunas';
    }
}

if (!function_exists('indonesian_currency')) {
    /**
     * Mengubah format mata uang menjadi format rupiah Indonesia.
     *
     * @param integer
     * @return String
     */
    function indonesian_currency(int $value): String
    {
        return 'Rp' . number_format($value, 2, ',', '.');
    }
}
