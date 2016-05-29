<?php

namespace AppBundle\Repository\Paciente;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * PacienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PacienteRepository extends DocumentRepository
{
    /**
     * @return array
     */
    public function getAllAppointments($month)
    {
        $appoints = array();
        $appointGross = $this->createQueryBuilder()
            ->field('citas')->exists(true)
            ->select('citas')
            ->getQuery()
            ->execute();

        foreach($appointGross as $appoint) {
            $appoints[] = $appoint->getFecha();
        }

        return $appoints;
    }
}