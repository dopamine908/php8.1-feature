<?php

use PHPUnit\Framework\TestCase;
use Src\FinalClassConstants\SonAfter;
use Src\FinalClassConstants\SonBefore;

class FinalClassConstantsTest extends TestCase
{
    /**
     * @test
     * final const 宣告性質
     */
    public function intro()
    {
        /**
         * 以往的 const 如果在繼承的狀況下
         * 是有可能會被覆蓋的
         * 無法保持最終的醫治性
         * 但新的 final const 宣告可以讓 const 不被覆蓋
         */
        $sonBefore = new SonBefore();
        $this->assertNotEquals('A', $sonBefore::A);
        $this->assertEquals('B', $sonBefore::A);

        /*
         * 若到 SonAfter 打開註解
         * 則會看到錯誤
         * PHP Fatal error:  Src\FinalClassConstants\SonAfter::A cannot override final constant
         */
        $sonAfter = new SonAfter();
        $this->assertEquals('A', $sonAfter::A);
    }
}
