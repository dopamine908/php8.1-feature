<?php

namespace Src\NewInInitializers;

class DemoE
{
    /**
     * 在宣告的時候直接指定預設的物件目前還是不被允許的
     * 靜態或是非靜態屬性都不被允許
     * 原因我有點看不太懂
     * @see https://wiki.php.net/rfc/new_in_initializers
     * # Unsupported positions
     */
//    public const NULL_LOGGER = new NullLogger();
//    public Logger $logg = new Logger();
}
