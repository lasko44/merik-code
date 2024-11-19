<?php

namespace App\Utilities;

use ReflectionException;

class PhpUnitHelper
{
    /**
     * @throws ReflectionException
     */
    public static function invokePrivateFunction(string $class, string $functionName, array $parameters): mixed
    {
        $reflection = new \ReflectionClass($class);
        $function = $reflection->getMethod($functionName);
        $function->setAccessible(true);

        return $function->invokeArgs(null, $parameters);
    }
}