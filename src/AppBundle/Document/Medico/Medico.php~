<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 31/03/16
 * Time: 2:24 AM
 */

namespace AppBundle\Document\Medico;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear los pacientes
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Medico\MedicoRepository")
 */
class Medico {

    /**
     * @ODM\Id
     */
    protected $id;
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
    protected $email;
    /**
     * @ODM\String
     */
    protected $telefonoParticular;
    /**
     * @ODM\String
     */
    protected $telefonoEmergencia;
    

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
     * Set email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
}
