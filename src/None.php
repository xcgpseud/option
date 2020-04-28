<?php

namespace Option;

use Exception;

class None extends Option
{
    /**
     * @throws Exception
     */
    public function get()
    {
        throw new Exception('Can not get an item from a None Option.');
    }

    public function getOrElse($else)
    {
        return $else;
    }

    public function getOrCall(callable $call)
    {
        return call_user_func($call);
    }

    /**
     * @param Exception $exception
     * @throws Exception
     */
    public function getOrThrow(Exception $exception)
    {
        throw $exception;
    }

    public function isEmpty(): bool
    {
        return true;
    }

    public function isNotEmpty(): bool
    {
        return false;
    }
}