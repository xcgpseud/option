<?php

namespace Option;

interface OptionInterface
{
    public static function _($item): OptionInterface;

    public function get();

    public function getOrElse($else);

    public function getOrCall(callable $call);

    public function getOrThrow(\Exception $exception);

    public function isEmpty(): bool;

    public function isNotEmpty(): bool;
}