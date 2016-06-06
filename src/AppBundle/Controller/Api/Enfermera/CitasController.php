<?php


namespace AppBundle\Controller\Api\Enfermera;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class Citascontroller extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de productos
     * El arreglo generado alimenta la tabla "Productos"
     *
     * @return array
     * @Rest\View()
     */

    public function cgetCitasAction()
    {
        return $this->get('doctrine_mongodb')->getManager()
            ->getRepository('AppBundle:Paciente/Paciente')
            ->getAllAppointments();
    }
}

