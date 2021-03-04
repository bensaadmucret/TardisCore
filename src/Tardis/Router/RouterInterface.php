<?php

declare(strict_types=1);

namespace Tardis\Router;

interface RouterInterface
{
    public function add(string $route, array $params) : void;
}