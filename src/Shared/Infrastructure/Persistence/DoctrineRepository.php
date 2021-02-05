<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Shared\Domain\Entity;

abstract class DoctrineRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    protected function persist(Entity $entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush();
    }
}
