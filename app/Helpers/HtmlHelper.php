<?php

if (!function_exists('indexTable')) {
    /**
     * @param $currentPage
     * @param $perPage
     * @param $index
     *
     * @return string
     */
    function indexTable($currentPage, $perPage, $index): string
    {
        return ($currentPage * $perPage) - $perPage + $index + 1;
    }
}
