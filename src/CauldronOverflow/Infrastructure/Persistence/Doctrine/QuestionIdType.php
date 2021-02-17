<?php

declare(strict_types=1);


namespace CauldronOverflow\Infrastructure\Persistence\Doctrine;


use CauldronOverflow\Domain\Question\QuestionId;
use Shared\Infrastructure\Persistence\UuidType;

final class QuestionIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return QuestionId::class;
    }
}
