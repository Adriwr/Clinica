<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 31/03/16
 * Time: 2:24 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad para mapear la tabla de medicos
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicoRepository")
 * @ORM\Table(name="medico")
 */
class Medico {

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=14)
     */
    protected $rfc;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $cedulaProfesional;
    /**
     * @ORM\Column(type="string", length=75)
     */
    protected $nombre;
    /**
     * @ORM\Column(type="string", length=75)
     */
    protected $apellidos;
    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $password;
    /**
     * @ORM\Column(type="string", length=14)
     */
    protected $curp;
    /**
     * @ORM\Column(name="fecha_ingreso",type="datetimetz", nullable=true)
     */
    protected $fechaIngreso;
    /**
     * @ORM\OneToOne(targetEntity="Direccion")
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     */
    protected $direccion;


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
     * Set rfc
     *
     * @param string $rfc
     * @return Medico
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string 
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set cedulaProfesional
     *
     * @param string $cedulaProfesional
     * @return Medico
     */
    public function setCedulaProfesional($cedulaProfesional)
    {
        $this->cedulaProfesional = $cedulaProfesional;

        return $this;
    }

    /**
     * Get cedulaProfesional
     *
     * @return string 
     */
    public function getCedulaProfesional()
    {
        return $this->cedulaProfesional;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Medico
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
     * @return Medico
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
     * Set password
     *
     * @param string $password
     * @return Medico
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set curp
     *
     * @param string $curp
     * @return Medico
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string 
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Medico
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set direccion
     *
     * @param \AppBundle\Entity\Direccion $direccion
     * @return Medico
     */
    public function setDireccion(\AppBundle\Entity\Direccion $direccion = null)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return \AppBundle\Entity\Direccion 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}
