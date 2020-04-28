<?php

namespace Option;

use Exception;

class Some extends Option
{
    public function get()
    {
        return $this->item;
    }

    public function getOrElse($else)
    {
        return $this->item;
    }

    public function getOrCall(callable $call)
    {
        return $this->item;
    }

    public function getOrThrow(Exception $exception)
    {
        return $this->item;
    }

    public function isEmpty(): bool
    {
        return false;
    }

    public function isNotEmpty(): bool
    {
        return true;
    }
}