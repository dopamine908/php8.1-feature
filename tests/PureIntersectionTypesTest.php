<?php

use PHPUnit\Framework\TestCase;
use Src\PureIntersectionTypes\ActionA;
use Src\PureIntersectionTypes\ActionB;
use Src\PureIntersectionTypes\Demo1;

class PureIntersectionTypesTest extends TestCase
{
    /**
     * @test
     * 可以用 & 來限制輸入的參數必須符合兩種或多種型別
     * 這個例子中 Demo1 同事具有 ActionA 跟 ActionB 的 interface
     */
    public function intro()
    {
        $demo1 = new Demo1();
        $result = $this->introExample(multipleAction: $demo1);
        $this->assertEquals('pass', $result);
    }


    /**
     * intersection type 只接受 class or interface
     * 基礎型別無法使用 intersection type (ex: int&string)
     */
    public function introExample(ActionA&ActionB $multipleAction): string
    {
        return 'pass';
    }

    /**
     * 重複或是多餘的 type
     *
     *
     * function foo(): A&A {} // Disallowed
     *
     * use A as B;
     * function foo(): A&B {} // Disallowed ("use" is part of name resolution)
     */
}
