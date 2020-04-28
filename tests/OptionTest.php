<?php

namespace Tests;

use Option\None;
use Option\Option;
use Option\Some;
use PHPUnit\Framework\TestCase;
use stdClass;

class OptionTest extends TestCase
{
    /** @test */
    public function option_withValue_returnsSome(): void
    {
        foreach ([123, 'string', true, new stdClass()] as $item) {
            $x = Option::_($item);
            $this->assertInstanceOf(Some::class, $x);
        }
    }

    /** @test */
    public function option_withNull_returnsNone(): void
    {
        $x = Option::_(null);
        $this->assertInstanceOf(None::class, $x);
    }

    public function option_withOption_returnsOriginalOption(): void
    {
        $x = Option::_(123);
        $y = Option::_($x);

        $this->assertInstanceOf(Some::class, $y);
        $this->assertEquals(123, $y->getOrElse(0));
    }
}