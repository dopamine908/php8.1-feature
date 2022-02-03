<?php

use PHPUnit\Framework\TestCase;

class ArrayUnpackingWithStringKeysTest extends TestCase
{
    /**
     * @test
     * 在 php 8.1 之前
     * $array1 = ["a" => 1];
     * $array2 = ["a" => 2];
     * $array = [...$array1, ...$array2] 會出現以下錯誤
     * Fatal error : Uncaught Error: Cannot unpack array with string keys in [...][...]
     * 以往需要合併這種 key 有衝突的兩個 array
     * 需要使用 array_merge()
     * 但在 php 8.1 之後
     * [...$array1, ...$array2] 跟 array_merge() 的行為已經基本上一至了
     */
    public function intro()
    {
        $array1 = ["a" => 1];
        $array2 = ["a" => 2];
        $array = ["a" => 0, ...$array1, ...$array2];
        $this->assertEquals(["a" => 2], $array);

        $array = array_merge($array1, $array2);
        $this->assertEquals(["a" => 2], $array);

        $array1 = [1, 2, 3];
        $array2 = [4, 5, 6];
        $array = [...$array1, ...$array2];
        $this->assertEquals([1, 2, 3, 4, 5, 6], $array);
    }
}
