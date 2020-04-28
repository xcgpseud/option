<?php

namespace Option;

use Exception;

abstract class Option implements OptionInterface
{
    protected $item;

    protected function __construct($item)
    {
        $this->item = $item;
    }

    public static function _($item): OptionInterface
    {
        if (
            is_object($item) &&
            in_array(get_class($item), [
                Some::class,
                None::class
            ])
        ) {
            return $item;
        }

        return ! is_null($item) ? new Some($item) : new None($item);
    }

    abstract public function get();

    abstract public function getOrElse($else);

    abstract public function getOrCall(callable $call);

    abstract public function getOrThrow(Exception $exception);

    abstract public function isEmpty(): bool;

    abstract public function isNotEmpty(): bool;
}