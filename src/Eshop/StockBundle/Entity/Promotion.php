<?php
/**
 * Created by PhpStorm.
 * User: 2017
 * Date: 15/02/2017
 * Time: 15:43
 */

namespace Eshop\StockBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;
    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;
    /**
     * @ORM\Column(type="integer",length=11)
     */
    private $taux;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * @param mixed $taux
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;
    }

    
}