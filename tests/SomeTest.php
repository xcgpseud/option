<?php

namespace Tests;

use Option\Option;
use PHPUnit\Framework\TestCase;
use stdClass;

class SomeTest extends TestCase
{
    /** @test */
    public function some_get_returnsItem(): void
    {
        foreach ([123, 'string', true, new stdClass()] as $item) {
            $x = Option::_($item);
            $this->assertEquals($item, $x->get());
        }
    }

    /** @test */
    public function some_getOrElse_returnsItem(): void
    {
        foreach ([123, 'string', true, new stdClass()] as $item) {
            $x = Option::_($item);
            $this->assertEquals($item, $x->getOrElse(0));
        }
    }

    /** @test */
    public function some_getOrCall_returnsItem(): void
    {
        foreach ([123, 'string', true, new stdClass()] as $item) {
            $x = Option::_($item);
            $this->assertEquals($item, $x->getOrCall(function () { return 0; }));
        }
    }

    /** @test */
    public function some_getOrThrow_returnsItem(): void
    {
        foreach ([123, 'string', true, new stdClass()] as $item) {
            $x = Option::_($item);
            $this->assertEquals($item, $x->getOrThrow(new \Exception('You FAILED!')));
        }
    }

    /** @test */
    public function some_emptyChecks_returnCorrectBooleans(): void
    {
        $x = Option::_(123);

        $this->assertTrue($x->isNotEmpty());
        $this->assertFalse($x->isEmpty());
    }
}