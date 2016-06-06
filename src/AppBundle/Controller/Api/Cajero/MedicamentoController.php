<?php


namespace AppBundle\Controller\Api\Cajero;

use AppBundle\Document\Medicamento\Activo;
use AppBundle\Document\Medicamento\Medicamento;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\Medico\Medico;
use AppBundle\Document\Pago\Pago;
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
        $medicamentos =  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Medicamento\Medicamento' )
            ->getAll();
        $array = array();
        $counter = 0;
        foreach ($medicamentos as $medicamento){
            if($medicamento['existencias']>0) {
                $array[] = array(
                    'posicion' => $counter,
                    'id' => $medicamento["id"],
                    'nombreComercial' => $medicamento["nombreComercial"],
                    'precio' => "$".$medicamento["precio"],
                    'existencias' => $medicamento["existencias"],
                );
                $counter++;
            }
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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function postAction(Request$request){

        $medicamentos = $request->request->get('medicamentos');
        $monto = $request->request->get('monto');
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pago = new Pago();
        $pago->setConcepto("Compra de medicamentos");

        foreach ($medicamentos as $medicamento) {
            $med = $this->get( 'doctrine_mongodb' )->getManager()
                ->getRepository( 'AppBundle:Medicamento\Medicamento' )
                ->findOneBy(array('nombreComercial'=>$medicamento['nombreComercial']));
            $pago->addMedicamento($med);
            $med->setExistencias($med->getExistencias()-$medicamento['cantidad']);
            $dm->persist($med);
            $dm->flush();
        }
        $pago->setMonto($monto);
        $dm->persist($pago);
        $dm->flush();
        return array('mensaje'=>'La venta del medicamento se realizó satisfactoriamente');
    }
}

