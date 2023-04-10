<?php

namespace Shhoti\BlueprintNovaAddon\Contracts;

use Closure;

interface Task
{
    public function handle(array $data, Closure $next): array;
}
