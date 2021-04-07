<?php

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
