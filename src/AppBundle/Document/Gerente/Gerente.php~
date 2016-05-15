<?php

namespace AppBundle\Document\Gerente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Documento para mapear al gerente
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Gerente\GerenteRepository")
 */

class Gerente {
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
}
