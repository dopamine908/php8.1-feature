<?php

use PHPUnit\Framework\TestCase;
use Src\NewInInitializers\DemoA;
use Src\NewInInitializers\DemoB;
use Src\NewInInitializers\DemoC;
use Src\NewInInitializers\IntroAfter;
use Src\NewInInitializers\IntroBefore;
use Src\NewInInitializers\NullLogger;

class NewInInitializersTest extends TestCase
{
    public const A = 'A';

    /**
     * @test
     * 以往在初始化的時候有些預設值可能會是某些 class
     * 之前只能先讓他預設為 null
     * 並且在 construct 裡面判斷 null 才能指定 class 內參數預設值
     * 但在 php 8.1 之後可以在 construct 內直接指定預設值的 class
     */
    public function intro()
    {
        // 以前的預設值如果要帶入某個 class 的話需要用 這樣的處理方式
        $introBefore = new IntroBefore();
        $this->assertInstanceOf(NullLogger::class, $introBefore->logger);
        // 8.1 之後可以在 construct 直接宣告預設值
        $introAfter = new IntroAfter();
        $this->assertInstanceOf(NullLogger::class, $introAfter->logger);
    }

    /**
     * @test
     * 新的帶入預設值方式除了可以在初始化中使用
     * 在一般的 function 也可以使用
     */
    public function allowed()
    {
        $actual = $this->demoAllowed();
        $this->assertTrue($actual);
    }

    public function demoAllowed(
        DemoA $demoA = new DemoA(),
        DemoB $demoB = new DemoB(123),
        DemoC $demoC = new DemoC(prop: 'test')
    ) {
        return true;
    }

    /**
     * 底下這些預設值的狀況不被允許使用
     * 會直接讓程式的執行失敗
     * @return void
     */
    // All not allowed (compile-time error):
//    function demoNotAllow(
//        $a = new (self::A)(), // dynamic class name
//        $b = new class {
//        }, // anonymous class
//        $c = new DemoC($abc), // unsupported constant expression
//        $d = new DemoD(...[]), // argument unpacking
//    )
//    {
//    }
}
