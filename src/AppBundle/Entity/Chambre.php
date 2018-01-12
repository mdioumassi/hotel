<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 * @UniqueEntity(fields={"numChambre"}, message="Ce chambre existe dejà")
 */
class Chambre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="num_chambre", type="integer", unique=true)
     */
    private $numChambre;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="date_arrivee", type="datetimetz")
     */
    private $dateArrivee;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="date_depart", type="datetimetz")
     */
    private $dateDepart;

    /**
     * @var bool
     * @Assert\NotBlank()
     * @ORM\Column(name="petit_dej", type="boolean")
     */
    private $petitDej;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre_personne", type="integer")
     */
    private $nombrePersonne;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numChambre
     *
     * @param integer $numChambre
     *
     * @return Reservation
     */
    public function setNumChambre($numChambre)
    {
        $this->numChambre = $numChambre;

        return $this;
    }

    /**
     * Get numChambre
     *
     * @return int
     */
    public function getNumChambre()
    {
        return $this->numChambre;
    }

    /**
     * Set dateArrivee
     *
     * @param \DateTime $dateArrivee
     *
     * @return Reservation
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Reservation
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set petitDej
     *
     * @param boolean $petitDej
     *
     * @return Reservation
     */
    public function setPetitDej($petitDej)
    {
        $this->petitDej = $petitDej;

        return $this;
    }

    /**
     * Get petitDej
     *
     * @return bool
     */
    public function getPetitDej()
    {
        return $this->petitDej;
    }

    /**
     * Set nombrePersonne
     *
     * @param integer $nombrePersonne
     *
     * @return Reservation
     */
    public function setNombrePersonne($nombrePersonne)
    {
        $this->nombrePersonne = $nombrePersonne;

        return $this;
    }

    /**
     * Get nombrePersonne
     *
     * @return int
     */
    public function getNombrePersonne()
    {
        return $this->nombrePersonne;
    }
}

