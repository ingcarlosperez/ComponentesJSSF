<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Disponibilidad
 *
 * @ORM\Entity(repositoryClass="DisponibilidadRepository")
 * @ORM\Table(name="disponibilidad", indexes={@ORM\Index(name="fk_disponibilidad_tramite_idx", columns={"tramite_id"})})
 */
class Disponibilidad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $tramite_id;

    /**
     * @ORM\OneToMany(targetEntity="Agenda", mappedBy="disponibilidad")
     * @ORM\JoinColumn(name="id", referencedColumnName="disponibilidad_id", nullable=false)
     */
    protected $agendas;

    /**
     * @ORM\ManyToOne(targetEntity="Tramite", inversedBy="disponibilidads")
     * @ORM\JoinColumn(name="tramite_id", referencedColumnName="id", nullable=false)
     */
    protected $tramite;

    public function __construct()
    {
        $this->agendas = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Disponibilidad
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
     * Set the value of tramite_id.
     *
     * @param integer $tramite_id
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function setTramiteId($tramite_id)
    {
        $this->tramite_id = $tramite_id;

        return $this;
    }

    /**
     * Get the value of tramite_id.
     *
     * @return integer
     */
    public function getTramiteId()
    {
        return $this->tramite_id;
    }

    /**
     * Add Agenda entity to collection (one to many).
     *
     * @param \AppBundle\Entity\Agenda $agenda
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function addAgenda(Agenda $agenda)
    {
        $this->agendas[] = $agenda;

        return $this;
    }

    /**
     * Remove Agenda entity from collection (one to many).
     *
     * @param \AppBundle\Entity\Agenda $agenda
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function removeAgenda(Agenda $agenda)
    {
        $this->agendas->removeElement($agenda);

        return $this;
    }

    /**
     * Get Agenda entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgendas()
    {
        return $this->agendas;
    }

    /**
     * Set Tramite entity (many to one).
     *
     * @param \AppBundle\Entity\Tramite $tramite
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function setTramite(Tramite $tramite = null)
    {
        $this->tramite = $tramite;

        return $this;
    }

    /**
     * Get Tramite entity (many to one).
     *
     * @return \AppBundle\Entity\Tramite
     */
    public function getTramite()
    {
        return $this->tramite;
    }

    public function __sleep()
    {
        return array('id', 'tramite_id');
    }
}
