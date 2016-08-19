<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Tramite
 *
 * @ORM\Entity(repositoryClass="TramiteRepository")
 * @ORM\Table(name="tramite")
 */
class Tramite
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Disponibilidad", mappedBy="tramite")
     * @ORM\JoinColumn(name="id", referencedColumnName="tramite_id", nullable=false)
     */
    protected $disponibilidads;

    public function __construct()
    {
        $this->disponibilidads = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Tramite
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add Disponibilidad entity to collection (one to many).
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidad
     * @return \AppBundle\Entity\Tramite
     */
    public function addDisponibilidad(Disponibilidad $disponibilidad)
    {
        $this->disponibilidads[] = $disponibilidad;

        return $this;
    }

    /**
     * Remove Disponibilidad entity from collection (one to many).
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidad
     * @return \AppBundle\Entity\Tramite
     */
    public function removeDisponibilidad(Disponibilidad $disponibilidad)
    {
        $this->disponibilidads->removeElement($disponibilidad);

        return $this;
    }

    /**
     * Get Disponibilidad entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilidads()
    {
        return $this->disponibilidads;
    }

    public function __sleep()
    {
        return array('id');
    }
}
