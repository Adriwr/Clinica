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
 * Entidad para mapear la tabla de dirección de medicos
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DireccionRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="direccion")
 */
class Direccion {

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $calle;
    /**
     * @ORM\Column(name="num_int" ,type="string", length=30)
     */
    protected $numInt;
    /**
     * @ORM\Column(name="num_ext" ,type="string", length=30)
     */
    protected $numExt;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $colonia;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $localidad;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $municipio;
    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $cp;
    /**
     * @ORM\Column(type="string", length=70)
     */
    protected $estado;


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
     * Set calle
     *
     * @param string $calle
     * @return Direccion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numInt
     *
     * @param string $numInt
     * @return Direccion
     */
    public function setNumInt($numInt)
    {
        $this->numInt = $numInt;

        return $this;
    }

    /**
     * Get numInt
     *
     * @return string 
     */
    public function getNumInt()
    {
        return $this->numInt;
    }

    /**
     * Set numExt
     *
     * @param string $numExt
     * @return Direccion
     */
    public function setNumExt($numExt)
    {
        $this->numExt = $numExt;

        return $this;
    }

    /**
     * Get numExt
     *
     * @return string 
     */
    public function getNumExt()
    {
        return $this->numExt;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     * @return Direccion
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string 
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return Direccion
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Direccion
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Direccion
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Direccion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
