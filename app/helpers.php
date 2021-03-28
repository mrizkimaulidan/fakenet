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
