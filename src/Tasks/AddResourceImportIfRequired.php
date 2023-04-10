<?php

namespace Shhoti\BlueprintNovaAddon\Tasks;

use Closure;
use Illuminate\Support\Str;
use Shhoti\BlueprintNovaAddon\Contracts\Task;

class AddResourceImportIfRequired implements Task
{
    private string $resourceBaseClass;

    public function __construct(string $resourceBaseClass)
    {
        $this->resourceBaseClass = $resourceBaseClass;
    }

    public function handle(array $data, Closure $next): array
    {
        $baseNamespace = Str::beforeLast($this->resourceBaseClass, '\\');

        $targetClass = $data['resource'];
        $targetNamespace = Str::beforeLast($targetClass, '\\');

        if ($baseNamespace === $targetNamespace) {
            return $next($data);
        }

        $data['imports'][] = "use {$this->resourceBaseClass};";

        return $next($data);
    }
}
