<?php

namespace App\Helpers;

class Iterables
{
    public static function add(iterable $collection, mixed $data)
    {
        return match (true) {
            is_array($collection) => $collection[] = $collection,
        };
    }
}