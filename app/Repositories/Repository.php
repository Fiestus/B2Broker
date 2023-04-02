<?php

namespace App\Repositories;



abstract class Repository
{
    /**
     * @return iterable
     */
    abstract public function all(): iterable;
}