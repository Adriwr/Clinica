<?php

namespace AppBundle\Document\Paciente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear los pacientes
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Paciente\PacienteRepository")
 */
class Paciente {
    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $idEmail;
    /**
     * @ODM\String
     */
    protected $nombre;
    /**
     * @ODM\String
     */
    protected $apellidos;
    /**
     * @ODM\String
     */
    protected $sexo;
    /**
     * @ODM\Date
     */
    protected $fechaNacimiento;
    /**
     * @ODM\String
     */
    protected $calle;
    /**
     * @ODM\String
     */
    protected $numero;
    /**
     * @ODM\String
     */
    protected $colonia;
    /**
     * @ODM\String
     */
    protected $estado;
    /**
     * @ODM\String
     */
    protected $pais;
    /**
     * @ODM\String
     */
    protected $telefonoParticular;
    /**
     * @ODM\String
     */
    protected $telefonoEmergencia;
    /**
     * @ODM\EmbedMany(targetDocument="PacienteCitas")
     */
    protected $citas;

    public function __construct()
    {
        $this->citas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string $sexo
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fechaNacimiento
     *
     * @param date $fechaNacimiento
     * @return self
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return date $fechaNacimiento
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return self
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
        return $this;
    }

    /**
     * Get calle
     *
     * @return string $calle
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * Get numero
     *
     * @return string $numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     * @return self
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
        return $this;
    }

    /**
     * Get colonia
     *
     * @return string $colonia
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * Get estado
     *
     * @return string $estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }

    /**
     * Get pais
     *
     * @return string $pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set telefonoParticular
     *
     * @param string $telefonoParticular
     * @return self
     */
    public function setTelefonoParticular($telefonoParticular)
    {
        $this->telefonoParticular = $telefonoParticular;
        return $this;
    }

    /**
     * Get telefonoParticular
     *
     * @return string $telefonoParticular
     */
    public function getTelefonoParticular()
    {
        return $this->telefonoParticular;
    }

    /**
     * Set telefonoEmergencia
     *
     * @param string $telefonoEmergencia
     * @return self
     */
    public function setTelefonoEmergencia($telefonoEmergencia)
    {
        $this->telefonoEmergencia = $telefonoEmergencia;
        return $this;
    }

    /**
     * Get telefonoEmergencia
     *
     * @return string $telefonoEmergencia
     */
    public function getTelefonoEmergencia()
    {
        return $this->telefonoEmergencia;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string $apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Add cita
     *
     * @param AppBundle\Document\Paciente\PacienteCitas $cita
     */
    public function addCita(\AppBundle\Document\Paciente\PacienteCitas $cita)
    {
        $this->citas[] = $cita;
    }

    /**
     * Remove cita
     *
     * @param AppBundle\Document\Paciente\PacienteCitas $cita
     */
    public function removeCita(\AppBundle\Document\Paciente\PacienteCitas $cita)
    {
        $this->citas->removeElement($cita);
    }

    /**
     * Get citas
     *
     * @return \Doctrine\Common\Collections\Collection $citas
     */
    public function getCitas()
    {
        return $this->citas;
    }
}
