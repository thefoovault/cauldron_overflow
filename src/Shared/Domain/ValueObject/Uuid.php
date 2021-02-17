<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class Uuid extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureValidUuid($value);
        parent::__construct($value);
    }

    public static function generate(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    private function ensureValidUuid(string $value)
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>', self::class, $value));
        }
    }
}
