<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\Agenda
 *
 * @ORM\Entity(repositoryClass="AgendaRepository")
 * @ORM\Table(name="agenda", indexes={@ORM\Index(name="fk_agenda_disponibilidad1_idx", columns={"disponibilidad_id"})})
 */
class Agenda
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $disponibilidad_id;

    /**
     * @ORM\ManyToOne(targetEntity="Disponibilidad", inversedBy="agendas")
     * @ORM\JoinColumn(name="disponibilidad_id", referencedColumnName="id", nullable=false)
     */
    protected $disponibilidad;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Agenda
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
     * Set the value of disponibilidad_id.
     *
     * @param integer $disponibilidad_id
     * @return \AppBundle\Entity\Agenda
     */
    public function setDisponibilidadId($disponibilidad_id)
    {
        $this->disponibilidad_id = $disponibilidad_id;

        return $this;
    }

    /**
     * Get the value of disponibilidad_id.
     *
     * @return integer
     */
    public function getDisponibilidadId()
    {
        return $this->disponibilidad_id;
    }

    /**
     * Set Disponibilidad entity (many to one).
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidad
     * @return \AppBundle\Entity\Agenda
     */
    public function setDisponibilidad(Disponibilidad $disponibilidad = null)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get Disponibilidad entity (many to one).
     *
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    public function __sleep()
    {
        return array('id', 'disponibilidad_id');
    }
}
