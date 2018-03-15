<?php

namespace App\Repository;

use App\Entity\Avenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Avenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avenant[]    findAll()
 * @method Avenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvenantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Avenant::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
