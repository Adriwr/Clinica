<?php

namespace AppBundle\Document\Medicamento;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento para mapear los medicamentos
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Medicamento\MedicamentoRepository")
 */
class Medicamento {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $nombreComercial;
    /**
     * @ODM\Float
     */
    protected $precio;
    /**
     * @ODM\String
     */
    protected $laboratorio;
    /**
     * @ODM\String
     */
    protected $presentacion;
    /**
     * @ODM\String
     */
    protected $cantidad;
    /**
     * @ODM\Int
     */
    protected $existencias;
    /**
     * @ODM\EmbedMany(targetDocument="Activo")
     */
    protected $activos;

    public function __construct()
    {
        $this->activos = new ArrayCollection();
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
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return self
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;
        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string $nombreComercial
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * Get precio
     *
     * @return float $precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set laboratorio
     *
     * @param string $laboratorio
     * @return self
     */
    public function setLaboratorio($laboratorio)
    {
        $this->laboratorio = $laboratorio;
        return $this;
    }

    /**
     * Get laboratorio
     *
     * @return string $laboratorio
     */
    public function getLaboratorio()
    {
        return $this->laboratorio;
    }

    /**
     * Set presentacion
     *
     * @param string $presentacion
     * @return self
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;
        return $this;
    }

    /**
     * Get presentacion
     *
     * @return string $presentacion
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * Set cantidad
     *
     * @param string $cantidad
     * @return self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string $cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set existencias
     *
     * @param int $existencias
     * @return self
     */
    public function setExistencias($existencias)
    {
        $this->existencias = $existencias;
        return $this;
    }

    /**
     * Get existencias
     *
     * @return int $existencias
     */
    public function getExistencias()
    {
        return $this->existencias;
    }

    /**
     * Add activo
     *
     * @param AppBundle\Document\Medicamento\Activo $activo
     */
    public function addActivo(\AppBundle\Document\Medicamento\Activo $activo)
    {
        $this->activos[] = $activo;
    }

    /**
     * Remove activo
     *
     * @param AppBundle\Document\Medicamento\Activo $activo
     */
    public function removeActivo(\AppBundle\Document\Medicamento\Activo $activo)
    {
        $this->activos->removeElement($activo);
    }

    /**
     * Get activos
     *
     * @return \Doctrine\Common\Collections\Collection $activos
     */
    public function getActivos()
    {
        return $this->activos;
    }
}
