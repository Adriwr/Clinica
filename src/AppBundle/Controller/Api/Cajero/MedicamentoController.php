<?php


namespace AppBundle\Controller\Api\Cajero;

use AppBundle\Document\Medicamento\Activo;
use AppBundle\Document\Medicamento\Medicamento;
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

    /**
     * @param Request $request
     * @return array
     */
    public function postNuevoAction(Request $request){

        $dm = $this->get( 'doctrine_mongodb' )->getManager();
        $medicamento = $request->request->get('medicamento');
        $medicamentoDco = new Medicamento();
        $medicamentoDco->setCantidad($medicamento['cantidad']);
        $medicamentoDco->setExistencias($medicamento['existencias']);
        $medicamentoDco->setLaboratorio($medicamento['laboratorio']);
        $medicamentoDco->setNombreComercial($medicamento['nombreComercial']);
        $medicamentoDco->setPrecio($medicamento['precio']);
        $medicamentoDco->setPresentacion($medicamento['presentacion']);
        foreach($medicamento['activos'] as $activos){
            $activo = new Activo();
            $activo->setCantidad($activos['cantidad']);
            $activo->setNombre($activos['nombre']);
            $medicamentoDco->addActivo($activo);
        }

        $dm->persist($medicamentoDco);
        $dm->flush();

        return array(
            "mensaje" => "Medicamento registrado exitosamente"
        );
    }
}

