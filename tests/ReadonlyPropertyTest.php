<?php

use PHPUnit\Framework\TestCase;
use Src\ReadonlyProperty\Boy;
use Src\ReadonlyProperty\Host;
use Src\ReadonlyProperty\House;
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

    /**
     * @test
     * 若是在 Readonly Property 設定物件的話
     * 物件內的值是可以更改的
     * (只掌管定義過的 Readonly Property Reference 不能夠被改變)
     */
    public function intro3()
    {
        $host = new Host('John');
        $house = new House($host);
        $this->assertEquals('John', $house->host->name);

        // 定義過的 host 不能夠被修改
//        $newHost = new Host('Tom');
//        $house->host = $newHost;
        // 但 定義過的 host name 卻可以
        $house->host->name = 'Tom';
        $this->assertEquals('Tom', $house->host->name);
    }
}
