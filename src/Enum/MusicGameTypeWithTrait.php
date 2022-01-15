<?php

namespace Src\Enum;

enum MusicGameTypeWithTrait: string
{
    use ShowCompanyTrait;

    case Gitadora = 'gitadora';
    case IIDX = 'iidx';
    case Chunithm = 'chunithm';
}
