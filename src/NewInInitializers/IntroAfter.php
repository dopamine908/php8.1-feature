<?php

namespace Src\NewInInitializers;

class IntroAfter
{
    public function __construct(
        public Logger $logger = new NullLogger,
    ) {
    }
}
