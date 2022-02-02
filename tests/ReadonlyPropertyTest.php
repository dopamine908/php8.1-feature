<?php

use PHPUnit\Framework\TestCase;
use Src\ReadonlyProperty\Boy;
use Src\ReadonlyProperty\Host;
use Src\ReadonlyProperty\House;
use Src\ReadonlyProperty\OtherBoy;
use Src\ReadonlyProperty\Restrictions;
use Src\ReadonlyProperty\Son;
use Src\ReadonlyProperty\Son1;
use Src\ReadonlyProperty\Son2;

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

    /**
     * @test
     * Readonly Property 不能夠給予預設值(只能透過 constructor 指定）
     */
    public function restrictions()
    {
        // 可以到 Restrictions 內打開註解看執行的錯誤
        $restrictions = new Restrictions();
        // PHP Fatal error:  Readonly property Src\ReadonlyProperty\Restrictions::$prop cannot have default value
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function inheritance()
    {
        /*
         * 可到 Son, Father 打開 $prop1 or $prop2 的註解
         * 可以知道同一個變數在繼承的過程
         * 如果有宣告成 readonly 則不可以用其他非 readonly 的宣告去覆蓋
         */
        $son = new Son();
        $this->assertTrue(true);

        /**
         * 父跟子類別都宣告 readonly 的話就不會衝突
         * 初始化的過程不管是在父類或是子類都可以
         * Son1 為初始化在父類的例子
         * Son2 為初始化在子類的例子
         */
        $son1 = new Son1();
        $this->assertEquals('test', $son1->prop);
        $son2 = new Son2();
        $this->assertEquals('test', $son2->prop);
    }

    /**
     * @test
     * 打開下方註解可以觀察到
     * 在使用 trait 的時候
     * 如果有兩個同名變數
     * 一個宣告 readonly 一個非 readonly
     * 則會有衝突的狀況
     */
    public function trait_case()
    {
//        $demo = new DemoTrait();
        $this->assertTrue(true);
    }
}
