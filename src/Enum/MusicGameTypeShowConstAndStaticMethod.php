<?php

namespace Src\Enum;

enum MusicGameTypeShowConstAndStaticMethod: string
{
    case Gitadora = 'gitadora';
    case IIDX = 'iidx';
    case Chunithm = 'chunithm';

    public const GAME_TYPE = 'musicGame';

    public static function getSegaMusicGame(): MusicGameTypeShowConstAndStaticMethod
    {
        return self::Chunithm;
    }
}
