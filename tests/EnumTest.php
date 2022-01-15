<?php

use PHPUnit\Framework\TestCase;
use Src\Enum\MusicGameInfo;
use Src\Enum\MusicGameType;
use Src\Enum\MusicGameTypeWithDefaultValue;
use Src\Enum\MusicGameTypeWithMethods;

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

    /**
     * 目前可對 Enum 限制回傳的 type
     * 但尚不支援 union
     */

    /**
     * @test
     * Enum::from
     * 可以輸入 value > 返回對應的 Enum::key
     * 注意：如果 value 沒有配對成功 > 則會觸發 ValueError
     */
    public function from()
    {
        $from = MusicGameTypeWithDefaultValue::from('iidx');
        $this->assertEquals('IIDX', $from->name);
        $this->assertEquals('iidx', $from->value);

        // value 沒有配對成功
        // $fromNotExist=MusicGameTypeWithDefaultValue::from('jubeat');
    }

    /**
     * @test
     * Enum::tryFrom
     * 可以輸入 value > 返回對應的 Enum::key
     * 如果 value 沒有配對成功 > 會返回 null
     */
    public function tryFrom()
    {
        // 大小寫不同也視為配對不成功
        $tryFromWhichUpLowerNotMatch = MusicGameTypeWithDefaultValue::tryFrom('IiDx');
        $tryFromWhichNotExist = MusicGameTypeWithDefaultValue::tryFrom('jubeat');

        $this->assertEquals(null, $tryFromWhichUpLowerNotMatch);
        $this->assertEquals(null, $tryFromWhichNotExist);
    }

    /**
     * @test
     * 在 Enum 裡面可以擴充 function
     * 不論是使用 interface 或是 自己另外新增都可以
     * 另外值得注意的是
     * 在 Enum 的 function 內使用 $this 會得到 Enum::case 的實體
     */
    public function methods()
    {
        $iidxCompany = MusicGameTypeWithMethods::IIDX->showCompany();
        $this->assertEquals('Konami', $iidxCompany);
        $gitadoraCompany = MusicGameTypeWithMethods::Gitadora->showCompany();
        $this->assertEquals('Konami', $gitadoraCompany);
        $ChunithmCompany = MusicGameTypeWithMethods::Chunithm->showCompany();
        $this->assertEquals('Sega', $ChunithmCompany);

        $hasIidxHavingScratch = MusicGameTypeWithMethods::IIDX->hasScratch();
        $this->assertTrue($hasIidxHavingScratch);
        $hasGitadoraHavingScratch = MusicGameTypeWithMethods::Gitadora->hasScratch();
        $this->assertFalse($hasGitadoraHavingScratch);
        $hasChunithmHavingScratch = MusicGameTypeWithMethods::Chunithm->hasScratch();
        $this->assertFalse($hasChunithmHavingScratch);
    }
}
