<?php

namespace Tests;

use Exception;
use Option\Option;
use PHPUnit\Framework\TestCase;

class NoneTest extends TestCase
{
    /** @test */
    public function none_get_throwsException(): void
    {
        $x = Option::_(null);

        try {
            $x->get();
            $this->fail('No Exception was thrown.');
        } catch (Exception $e) {
            $this->assertInstanceOf(Exception::class, $e);
            $this->assertEquals('Can not get an item from a None Option.', $e->getMessage());
        }
    }

    /** @test */
    public function none_getOrElse_returnsElse(): void
    {
        $x = Option::_(null);

        $this->assertEquals(123, $x->getOrElse(123));
    }

    /** @test */
    public function none_getOrCall_returnsCall(): void
    {
        $x = Option::_(null);

        $this->assertEquals(10, $x->getOrCall(function () { return 5 * 2; }));
    }

    /** @test */
    public function getOrThrow(): void
    {
        $x = Option::_(null);

        try {
            $x->getOrThrow(new Exception('FAIL!'));
            $this->fail('No Exception was thrown.');
        } catch (Exception $e) {
            $this->assertInstanceOf(Exception::class, $e);
            $this->assertEquals('FAIL!', $e->getMessage());
        }
    }

    /** @test */
    public function none_emptyChecks_returnCorrectBooleans(): void
    {
        $x = Option::_(null);

        $this->assertFalse($x->isNotEmpty());
        $this->assertTrue($x->isEmpty());
    }
}