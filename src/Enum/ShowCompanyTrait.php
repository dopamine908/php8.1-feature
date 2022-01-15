<?php

namespace Src\Enum;

trait ShowCompanyTrait
{
    public function showCompany(): string
    {
        return match ($this) {
            MusicGameTypeWithTrait::Gitadora, MusicGameTypeWithTrait::IIDX => 'Konami',
            MusicGameTypeWithTrait::Chunithm => 'Sega',
        };
    }
}
