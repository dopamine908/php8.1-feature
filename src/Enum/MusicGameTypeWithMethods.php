<?php

namespace Src\Enum;

enum MusicGameTypeWithMethods: string implements CompanyShowingContact
{
    case Gitadora = 'gitadora';
    case IIDX = 'iidx';
    case Chunithm = 'chunithm';

    public function showCompany(): string
    {
        return match ($this) {
            self::Gitadora, self::IIDX => 'Konami',
            self::Chunithm => 'Sega',
        };
    }

    public function hasScratch(): bool
    {
        /**
         * $this = MusicGameTypeWithMethods::Gitadora
         * $this = MusicGameTypeWithMethods::IIDX
         * $this = MusicGameTypeWithMethods::Chunithm
         */
        if ($this === self::IIDX) {
            return true;
        }
        return false;
    }
}
