<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad para mapear la tabla de cajeros
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PagoRepository")
 * @ORM\Table(name="pago")
 */
class Pago {
    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $monto;
    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $fecha;
    /**
     * @ORM\ManyToOne(targetEntity="Cajero", inversedBy="pago")
     * @ORM\JoinColumn(name="id_cajero", referencedColumnName="id")
     */
    protected $idCajero;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Pago
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pago
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idCajero
     *
     * @param \AppBundle\Entity\Cajero $idCajero
     * @return Pago
     */
    public function setIdCajero(\AppBundle\Entity\Cajero $idCajero = null)
    {
        $this->idCajero = $idCajero;

        return $this;
    }

    /**
     * Get idCajero
     *
     * @return \AppBundle\Entity\Cajero 
     */
    public function getIdCajero()
    {
        return $this->idCajero;
    }
}
