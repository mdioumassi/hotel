<?php
namespace AppBundle\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Chambre;

class LoadReservationData extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $chambre = new Chambre();
        $chambre->setNumChambre(100)
                ->setDateArrivee(new \DateTime("2018-01-10"))
                ->setDateDepart(new \DateTime("2018-01-16"))
                ->setPetitDej(1)
                ->setNombrePersonne(2);
        $manager->persist($chambre);
        $manager->flush();
    }
}