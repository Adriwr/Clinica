<?php

namespace AppBundle\Repository\Medicamento;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * MedicamentoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MedicamentoRepository extends DocumentRepository
{
	/**
     * @return array
     */
    public function getAll()
    {
        $medicamentos = array();
        $medicamentosGross = $this->createQueryBuilder()
            ->getQuery()
            ->execute();

        foreach($medicamentosGross as $medicamento) {
            $medicamentos[] = array(
                'id'                => $medicamento->getId(),
                'nombreComercial'   => $medicamento->getNombreComercial(),
                'precio'        	=> $medicamento->getPrecio(),
                'laboratorio'    	=> $medicamento->getLaboratorio(),
                'presentacion'    	=> $medicamento->getPresentacion(),
                'cantidad'    		=> $medicamento->getLaboratorio(),
                'existencias'    	=> $medicamento->getExistencias(),
                'activos'    		=> $medicamento->getActivos()
            );
        }

        return $medicamentos;
    }

    public function getMedicamentoByName($nombre)
    {
        $result = $this->createQueryBuilder()
            ->field('nombre')->equals($nombre)
            ->getQuery()
            ->execute();
        return $result;
    }
}