<?php

use PHPUnit\Framework\TestCase;

class NoreturnTypeTest extends TestCase
{
    /**
     * @test
     * rfc 表示
     * noreturn type 是所有回傳類型的子集
     * 所以在繼承的時候對於任何的 type 都可以將其覆蓋
     * 例如例子中父類別的 hasAgreedToTerms():bool
     * 而子類別卻用 hasAgreedToTerms():noreturn
     *
     * ▶︎ 照理來說應該要可以執行成功
     * 但執行結果為
     * PHP Fatal error:  Declaration of Src\NoreturnType\Kid::hasAgreedToTerms(): Src\NoreturnType\noreturn must be compatible with Src\NoreturnType\Person::hasAgreedToTerms(): bool
     */
    public function demo1()
    {
        $this->assertTrue(true);
//        $this->expectException(Exception::class);
//        $this->expectExceptionMessage('whoops');
//        $kid = new Kid();
//        $kid->hasAgreedToTerms();
    }
}
