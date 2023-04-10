<?php

namespace shhoti\BlueprintNovaAddon\Contracts;

use Closure;

interface Task
{
    public function handle(array $data, Closure $next): array;
}
