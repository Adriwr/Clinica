<?php

namespace AppBundle\Document\Pago;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido para mapear el pago de productos, medicamentos o consulta en caja
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Pago\PagoRepository")
 */
class Pago {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\Float
     */
    protected $monto;
    /**
     * @ODM\Date
     */
    protected $fecha;
    /**
     * @ODM\String
     */
    protected $concepto;
    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Medicamento\Medicamento")
     */
    protected $medicamentos;
    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Producto\Producto")
     */
    protected $productos;
    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Consulta\Consulta")
     */
    protected $consulta;
    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Cajero\Cajero")
     */
    protected $cajero;

    public function __construct()
    {
        $this->medicamentos = new ArrayCollection();
        $this->productos = new ArrayCollection();
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
     * Set monto
     *
     * @param float $monto
     * @return self
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
        return $this;
    }

    /**
     * Get monto
     *
     * @return float $monto
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set fecha
     *
     * @param date $fecha
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return date $fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return self
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
        return $this;
    }

    /**
     * Get concepto
     *
     * @return string $concepto
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Add medicamento
     *
     * @param AppBundle\Document\Medicamento\Medicamento $medicamento
     */
    public function addMedicamento(\AppBundle\Document\Medicamento\Medicamento $medicamento)
    {
        $this->medicamentos[] = $medicamento;
    }

    /**
     * Remove medicamento
     *
     * @param AppBundle\Document\Medicamento\Medicamento $medicamento
     */
    public function removeMedicamento(\AppBundle\Document\Medicamento\Medicamento $medicamento)
    {
        $this->medicamentos->removeElement($medicamento);
    }

    /**
     * Get medicamentos
     *
     * @return \Doctrine\Common\Collections\Collection $medicamentos
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * Add producto
     *
     * @param AppBundle\Document\Producto\Producto $producto
     */
    public function addProducto(\AppBundle\Document\Producto\Producto $producto)
    {
        $this->productos[] = $producto;
    }

    /**
     * Remove producto
     *
     * @param AppBundle\Document\Producto\Producto $producto
     */
    public function removeProducto(\AppBundle\Document\Producto\Producto $producto)
    {
        $this->productos->removeElement($producto);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection $productos
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set consulta
     *
     * @param AppBundle\Document\Consulta\Consulta $consulta
     * @return self
     */
    public function setConsulta(\AppBundle\Document\Consulta\Consulta $consulta)
    {
        $this->consulta = $consulta;
        return $this;
    }

    /**
     * Get consulta
     *
     * @return AppBundle\Document\Consulta\Consulta $consulta
     */
    public function getConsulta()
    {
        return $this->consulta;
    }

    /**
     * Set cajero
     *
     * @param AppBundle\Document\Cajero\Cajero $cajero
     * @return self
     */
    public function setCajero(\AppBundle\Document\Cajero\Cajero $cajero)
    {
        $this->cajero = $cajero;
        return $this;
    }

    /**
     * Get cajero
     *
     * @return AppBundle\Document\Cajero\Cajero $cajero
     */
    public function getCajero()
    {
        return $this->cajero;
    }
}
