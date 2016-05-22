<?php

namespace AppBundle\Document\Consulta;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento embebido para mapear recomendaciones de un tratamiento
 *
 * @ODM\EmbeddedDocument
 */
class TratamientoRecomendacion {

    /**
     * @ODM\String
     */
    protected $descripcion;
    /**
     * @ODM\String
     */
    protected $duracion;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string $descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     * @return self
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
        return $this;
    }

    /**
     * Get duracion
     *
     * @return string $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }
}
