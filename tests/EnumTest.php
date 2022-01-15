<?php

use PHPUnit\Framework\TestCase;
use Src\Enum\MusicGameInfo;
use Src\Enum\MusicGameType;
use Src\Enum\MusicGameTypeWithDefaultValue;

class EnumTest extends TestCase
{
    /**
     * @test 一般狀況
     */
    public function case1()
    {
        $this->assertEquals('Chunithm', MusicGameType::Chunithm->name);
        // 無法取用
        // $this->assertEquals('Chunithm', MusicGameType::Chunithm->value);
        $musicGameInfo = new MusicGameInfo();
        $actual = $musicGameInfo->showInfo(MusicGameType::Chunithm);
        $this->assertEquals('CHUNI', $actual);
    }

    /**
     * @test 一般狀況 > 可以設定預設值
     */
    public function case2()
    {
        $this->assertEquals('gitadora', MusicGameTypeWithDefaultValue::Gitadora->value);
        $this->assertEquals('Gitadora', MusicGameTypeWithDefaultValue::Gitadora->name);
    }

    /**
     * Enum 有 name, value 可以使用
     * name 指的是 key 的名稱
     * value 指的是值的名稱（如果有設定預設值的話）
     * 注意：如果沒有設定預設值的話 value 是無法取用的
     */
}
