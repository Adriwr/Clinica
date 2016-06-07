<?php

namespace AppBundle\Controller\Gerente;


use AppBundle\Document\Gerente\Gerente;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Gerente\GerenteRegistrationType;
use AppBundle\Form\Type\Gerente\GerenteType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class GerenteController extends Controller
{
    /**
     * Acción para mostrar el formulario de registro de gerente
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarGerenteAction(Request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new GerenteRegistrationType(), $usuario);

        $formUsuario->handleRequest($request);

        if ($formUsuario->isValid()) {

            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_GERENTE");
            $usuario->setUsername($usuario->getGerente()->getNombre() . " " . $usuario->getGerente()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();

            return $this->redirect($this->generateUrl('registrar_gerente'));
        }
        return $this->render(
            ':Gerente/registrar:registrarGerente.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }

    public function getConsultasDiaAction(Request $request){
        $medicos =$this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('medico');
        $date = date('Y-m-d', time());
        $regreso = array();
        $consultas = $this->get('doctrine_mongodb')->getManager()
            ->getRepository('AppBundle:Consulta\Consulta')->findAll();
        foreach ($medicos as $medico ) {
            $numConsultas = 0;
            foreach ($consultas as $consulta){
                if($medico->getiD() == $consulta->getMedico()){
                    if((string)$date == $consulta->getFecha()->format('Y-m-d')){
                        $numConsultas = $numConsultas+1;
                    }
                }

            }

            array_push($regreso,array('nombre' => $medico['nombre'], 'consultas' => $numConsultas));
        }
        return $this->render(':Gerente/actividad:consultarCitasRealizadas.html.twig', array('medicos' => $regreso,'consultas'=> $consultas, 'mensaje'=>"en el día"));


    }
    
    public function getConsultasMesAction(Request $request){
        $medicos =$this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('medico');
        $date = date('Y-m', time());
        $regreso = array();
        $consultas = $this->get('doctrine_mongodb')->getManager()
            ->getRepository('AppBundle:Consulta\Consulta')->findAll();
        foreach ($medicos as $medico ) {
            $numConsultas = 0;
            foreach ($consultas as $consulta){
                if($medico->getiD() == $consulta->getMedico()){
                    if((string)$date == $consulta->getFecha()->format('Y-m')){
                        $numConsultas = $numConsultas+1;
                    }
                }

            }

            array_push($regreso,array('nombre' => $medico['nombre'], 'consultas' => $numConsultas));
        }
        return $this->render(':Gerente/actividad:consultarCitasRealizadas.html.twig', array('medicos' => $regreso,'consultas'=> $consultas, 'mensaje'=>"en el mes"));
    }
    
    public function getArticulosVendidosDiaAction(Request $request)
    {
        $ventas = $this->get('doctrine_mongodb')->getManager()
            ->getRepository('AppBundle:Pago\Pago')->findAll();
        $ventasRegreso = array();
        $date = date('Y-m-d', time());
        foreach ($ventas as $venta){
            if((string)$date == $venta->getFecha()->format('Y-m-d')) {
                $producosArray = array();
                foreach ($venta->getMedicamentos() as $medicamento){
                    $producto = $this->get('doctrine_mongodb')->getManager()
                        ->getRepository('AppBundle:Medicamento\Medicamento')->findOneById($medicamento->getId());
                    array_push($producosArray, array('nombre'=>$producto->getNombreComercial()));
                }
                array_push($ventasRegreso, array('monto'=>$venta->getMonto(),'fecha'=>$venta->getFecha(),'productos'=>$producosArray));
            }

        }

        return $this->render(':Gerente/actividad:consultarArticulosVendidos.html.twig', array('articulos'=>$ventasRegreso, 'mensaje'=>"el dia"));
    }

    public function getArticulosVendidosMesAction(Request $request)
    {
        $ventas = $this->get('doctrine_mongodb')->getManager()
            ->getRepository('AppBundle:Pago\Pago')->findAll();
        $ventasRegreso = array();
        $date = date('Y-m', time());
        foreach ($ventas as $venta){
            if((string)$date == $venta->getFecha()->format('Y-m')) {
                $producosArray = array();
                foreach ($venta->getMedicamentos() as $medicamento){
                    $producto = $this->get('doctrine_mongodb')->getManager()
                        ->getRepository('AppBundle:Medicamento\Medicamento')->findOneById($medicamento->getId());
                    array_push($producosArray, array('nombre'=>$producto->getNombreComercial()));
                }
                array_push($ventasRegreso, array('monto'=>$venta->getMonto(),'fecha'=>$venta->getFecha(),'productos'=>$producosArray));
            }
        }
        return $this->render(':Gerente/actividad:consultarArticulosVendidos.html.twig', array('articulos'=>$ventasRegreso, 'mensaje'=>" el mes"));
    }
    
    public function getPacientesAction(Request $request)
    {
    	$pacientes = $this->get( 'doctrine_mongodb' )->getManager()
    		->getRepository( 'AppBundle:User\User' )
    		->getAllUsers('paciente');
     	return $this->render(':Gerente/actividad:mostrarPacientes.html.twig', array('pacientes' => $pacientes));
    }
   
}
