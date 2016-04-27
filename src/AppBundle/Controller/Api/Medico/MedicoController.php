<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 27/04/16
 * Time: 00:12 AM
 */

namespace AppBundle\Controller\Api\Medico;

use AppBundle\Entity\Nomina;
use AppBundle\Entity\Prenomina;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Checadas;


class MedicoController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de la tabla el medico
     * El arreglo generado alimenta la tabla "Medicos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction($idArea){
        $nomina = array();
        $em = $this->getDoctrine()->getManager();
        $posicion = 0;

        return $nomina;
    }

}

