<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de los antecedentes familiares del paciente
 *
 * @ODM\EmbeddedDocument
 */
class AntecedenteFamiliar {

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
    protected $sexo;
    /**
     * @ODM\Int
     */
    protected $edad;
    /**
     * @ODM\String
     */
    protected $parentesco;
    /**
     * @ODM\String
     */
    protected $telefono;
    /**
     * @ODM\Boolean
     */
    protected $controlada;
    /**
     * @ODM\Date
     */
    protected $fechaDiagnostico;
    /**
     * @ODM\EmbedMany(targetDocument="Enfermedad")
     */
    protected $enfermedadesCronicas;

    public function __construct()
    {
        $this->enfermedadesCronicas = new ArrayCollection();
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
     * Set edad
     *
     * @param int $edad
     * @return self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
        return $this;
    }

    /**
     * Get edad
     *
     * @return int $edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set parentesco
     *
     * @param string $parentesco
     * @return self
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;
        return $this;
    }

    /**
     * Get parentesco
     *
     * @return string $parentesco
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string $telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set controlada
     *
     * @param boolean $controlada
     * @return self
     */
    public function setControlada($controlada)
    {
        $this->controlada = $controlada;
        return $this;
    }

    /**
     * Get controlada
     *
     * @return boolean $controlada
     */
    public function getControlada()
    {
        return $this->controlada;
    }

    /**
     * Set fechaDiagnostico
     *
     * @param date $fechaDiagnostico
     * @return self
     */
    public function setFechaDiagnostico($fechaDiagnostico)
    {
        $this->fechaDiagnostico = $fechaDiagnostico;
        return $this;
    }

    /**
     * Get fechaDiagnostico
     *
     * @return date $fechaDiagnostico
     */
    public function getFechaDiagnostico()
    {
        return $this->fechaDiagnostico;
    }

    /**
     * Add enfermedadesCronica
     *
     * @param AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica
     */
    public function addEnfermedadesCronica(\AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica)
    {
        $this->enfermedadesCronicas[] = $enfermedadesCronica;
    }

    /**
     * Remove enfermedadesCronica
     *
     * @param AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica
     */
    public function removeEnfermedadesCronica(\AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica)
    {
        $this->enfermedadesCronicas->removeElement($enfermedadesCronica);
    }

    /**
     * Get enfermedadesCronicas
     *
     * @return \Doctrine\Common\Collections\Collection $enfermedadesCronicas
     */
    public function getEnfermedadesCronicas()
    {
        return $this->enfermedadesCronicas;
    }
}
