<?php
namespace Src\Enum;
class MusicGameInfo
{
    public function showInfo(MusicGameType $musicGameType): string
    {
        return match ($musicGameType) {
            MusicGameType::Chunithm => 'CHUNI',
            MusicGameType::iidx => 'IIDX',
            MusicGameType::Gitadora => 'GITADORA',
            default => 'unknown',
        };
    }
}
