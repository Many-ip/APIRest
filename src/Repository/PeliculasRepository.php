<?php
namespace App\Repository;

use App\Entity\Peliculas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Peliculas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peliculas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peliculas[]    findAll()
 * @method Peliculas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeliculasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, Peliculas::class);
        $this->manager = $manager;
    }

    public function savePelicula($nombre, $genero, $descripcion)
    {
        $newPeliculas = new Peliculas();

        $newPeliculas
            ->setNombre($nombre)
            ->setGenero($genero)
            ->setDescripcion($descripcion);

        $this->manager->persist($newPeliculas);
        $this->manager->flush();
    }

    public function updatePelicula(Peliculas $Peliculas): Peliculas
    {
        $this->manager->persist($Peliculas);
        $this->manager->flush();

        return $Peliculas;
    }


    public function removePelicula(Peliculas $Peliculas)
    {
        $this->manager->remove($Peliculas);
        $this->manager->flush();
    }
    // /**
    //  * @return Peliculas[] Returns an array of Peliculas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Peliculas
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
