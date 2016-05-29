<?php


namespace AppBundle\Controller\Api\Medico;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class MedicoController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de productos
     * El arreglo generado alimenta la tabla "Productos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('medico');
    }

    /**
     * Acción para generar los datos de productos
     * El arreglo generado sirve para obtener el nombre de un medico en un horario y consultorio
     *
     * @return array
     * @Rest\View()
     */
    public function getNombreAction($fecha, $consultorio){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Medico\Medico' )
            ->getDoctorName($fecha, $consultorio);
    }

}

