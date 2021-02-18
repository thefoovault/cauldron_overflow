<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Doctrine;

interface DoctrineCustomType
{
    public static function customTypeName(): string;
}
