<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad para mapear la tabla de cajeros
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CajeroRepository")
 * @ORM\Table(name="cajero")
 */
class Cajero {
    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="medico")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    protected $idUser;
    /**
     * @ORM\Column(type="string", length=14)
     */
    protected $nombre;
    /**
     * @ORM\Column(type="string", length=75)
     */
    protected $apellidos;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Cajero
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Cajero
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     * @return Cajero
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}