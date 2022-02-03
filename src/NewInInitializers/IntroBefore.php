<?php

namespace Src\NewInInitializers;

class IntroBefore
{
    public Logger $logger;

    public function __construct(
        ?Logger $logger = null,
    ) {
        $this->logger = $logger ?? new NullLogger;
    }
}
