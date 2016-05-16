<?php

namespace AppBundle\Document\Enfermera;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Documento para mapear la enfermera
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Enfermera\EnfermeraRepository")
 */

class Enfermera
{
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
     * @ODM\String
     */
    protected $email;

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
     * Set idEmail
     *
     * @param string $idEmail
     * @return self
     */
    public function setIdEmail($idEmail)
    {
        $this->idEmail = $idEmail;
        return $this;
    }

    /**
     * Get idEmail
     *
     * @return string $idEmail
     */
    public function getIdEmail()
    {
        return $this->idEmail;
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
