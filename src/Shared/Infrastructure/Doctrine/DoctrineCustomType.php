<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Doctrine;

interface DoctrineCustomType
{
    public static function customTypeName(): string;
}
