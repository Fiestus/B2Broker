<?php

namespace App\Repositories;



abstract class Repository
{
    /**
     * @return iterable<mixed>
     */
    abstract public function all(): iterable;
}