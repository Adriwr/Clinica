<?php


namespace AppBundle\Controller\Api\Cajero;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class MedicamentoController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de productos
     * El arreglo generado alimenta la tabla "Productos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        $users =  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('cajero');
        $array = array();
        $counter = 0;
        foreach ($users as $user){
            $array[] = array(
                'id'        => $user["id"],
                'posicion' => $counter,
                'nombre'                => $user["nombre"],
                //'nombre'   => $user->getNombre(),
                );
               /* 'precio'        	=> $user->getPrecio(),
                'laboratorio'    	=> $user->getLaboratorio(),
                'presentacion'    	=> $user->getPresentacion(),
                'cantidad'    		=> $user->getLaboratorio(),
                'existencias'    	=> $user->getExistencias(),
                'activos'    		=> $user->getActivos()*/
            $counter++;
        }
        return $array;
    }
}

