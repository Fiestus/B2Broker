<?php

namespace App\Trates;

trait MagicGet
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $name = strtoupper($name);
        $methodName = "get{$name}";

        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }
    }
}