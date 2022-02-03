<?php
namespace Src\NoreturnType;


class Demo1
{

    /**
     * noreturn type 可以反映在這個 function 最後是會 die or exit or throw.
     * @return noreturn
     */
    public function noreturn1(): noreturn
    {
        exit();
    }

    /**
     * noreturn type 可以反映在這個 function 最後是會 die or exit or throw.
     * @return noreturn
     */
    public function noreturn2(): noreturn
    {
        die();
    }

    /**
     * noreturn type 可以反映在這個 function 最後是會 die or exit or throw.
     * @return noreturn
     */
    public function noreturn3(): noreturn
    {
        throw new Exception();
    }
}
