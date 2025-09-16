<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * Repository de l'entité User.
 * Permet d'effectuer des requêtes personnalisées sur la table user.
 * Hérite des méthodes de base de Doctrine (find, findAll, findBy, etc).
 */
class UserRepository extends ServiceEntityRepository
{
    /**
     * Constructeur du repository User.
     * Initialise le repository avec la classe User et le registre Doctrine.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // Exemple de méthode personnalisée pour trouver des utilisateurs selon un champ
    // Décommente et adapte selon tes besoins
    /*
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}