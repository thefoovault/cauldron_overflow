<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Persistence;

use CauldronOverflow\Infrastructure\Persistence\Doctrine\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;
use Shared\Domain\ValueObject\Uuid;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    abstract protected function typeClassName(): string;

    public static function customTypeName(): string
    {
        $items = explode('\\', static::class);
        return str_replace('Type', '', end($items));
    }

    public function getName(): string
    {
        return Type::GUID;//self::customTypeName();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    /** @var Uuid $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }
}
