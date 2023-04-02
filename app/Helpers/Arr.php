<?php

namespace App\Helpers;

class Arr
{
    public static function usortDateStringsAsc(array $array, string $key): array
    {
        usort($array, function ($a, $b) use ($key) {
            return strtotime($a->$key) <=> strtotime($b->$key);
        });

        return $array;
    }

    public static function usortDateStringsDesc(array $array, string $key): array
    {
        usort($array, function ($a, $b) use ($key) {
            return strtotime($b->$key) <=> strtotime($a->$key);
        });

        return $array;
    }

    public static function usortBinaryStringsAsc(array $array, string $key): array
    {
        usort($array, function ($a, $b) use ($key) {
            return strcmp($a->$key, $b->$key);
        });

        return $array;
    }

    public static function usortBinaryStringsDesc(array $array, string $key): array
    {
        usort($array, function ($a, $b) use ($key) {
            return strcmp($b->$key, $a->$key);
        });

        return $array;
    }
}