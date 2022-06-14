<?php

namespace App\Serveces\Contract;

interface Parser
{
    public function setUrl(string $url): Parser;

    public function parse(): array;
}
