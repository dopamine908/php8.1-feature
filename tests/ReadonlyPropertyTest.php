<?php

use PHPUnit\Framework\TestCase;
use Src\ReadonlyProperty\Boy;
use Src\ReadonlyProperty\OtherBoy;

class ReadonlyPropertyTest extends TestCase
{
    /**
     * @test
     * Readonly Property
     * 可以強制讓 property 不能夠被修改
     */
    public function intro1()
    {
        $boy = new Boy();
        $this->assertEquals('male', $boy->gender);
        // Error : Cannot modify readonly property Src\ReadonlyProperty\Boy::$gender
        // $boy->gender='female';
    }

    /**
     * @test
     */
    public function intro2()
    {
        $otherBoy = new OtherBoy('John');
        $this->assertEquals('male', $otherBoy->gender);
        $this->assertEquals('John', $otherBoy->name);
        // Error : Cannot modify readonly property Src\ReadonlyProperty\OtherBoy::$name
        // $otherBoy->name='Jay';
    }
}
