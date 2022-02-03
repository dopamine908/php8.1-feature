<?php
namespace Src\NoreturnType;

class Demo2
{

    /**
     * 跟 void 一樣
     * noreturn 只能夠用於 function 的回類型宣告
     * @var noreturn
     */
    public noreturn $x; // Fatal error
}
