<?php

namespace AppBundle\Controller\Medico;

use AppBundle\Document\Consulta\Consulta;
use AppBundle\Document\Medico\Medico;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Medico\MedicoRegistrationType;
use AppBundle\Form\Type\Medico\MedicoType;
use AppBundle\Form\Type\User\RegistrationType;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Date;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class MedicoController extends Controller
{
    /**
     * Acción para mostrar el formulario de registrar médico
     * @Route("/", name="medico")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarMedicoAction(Request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new MedicoRegistrationType(), $usuario);

        $formUsuario->handleRequest($request);

        if ($formUsuario->isValid()) {

            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_MEDICO");
            $usuario->setUsername($usuario->getMedico()->getNombre() . " " . $usuario->getMedico()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();


            return $this->redirect($this->generateUrl('registrar_medico'));

        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Medico/registrar:registrarMedico.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
                )
        );
    }

    /**
     * Acción para mostrar las citas pagadas y que el medico pueda dar consulta
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function consultarCitasAction(Request $request)
    {
        $pacientes = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsersCitas('paciente');
        $medico = $this->getUser()->getMedico();
        
        return $this->render(
            ':Medico:consultarCitas.html.twig', array('pacientes'=>$pacientes, 'medico'=>$medico->getNombre()." ".$medico->getApellidos())
        );
    }

    /**
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function darConsultaAction(Request $request)
    {
        $medico = $this->getUser()->getMedico();
        $consultas = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Consulta\Consulta' )
            ->findAll();

        $paciente = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->findOneBy(array('id'=>$request->get('idPaciente')));


        $pacienteCopia = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Paciente\Paciente' )
            ->findOneBy(array('id'=>$paciente->getPaciente()->getId()));
        
        $consultaRegreso = new Consulta();
        foreach ($consultas as $consulta){
            if($medico["nombre"] == $consulta["medico"]){
                if((string)$consulta["fecha"]->format("Y-m-d-H-i") == $request->get('fecha')){
                    $consultaRegreso = $consulta;
                }
            }
        }
        $expediente = $pacienteCopia;
        return $this->render(
            ':Medico:pasoPrincipalConsulta.html.twig',
            array('consulta' => $consultaRegreso, 'pacienteID'=> $request->get('idPaciente'),'paciente'=>$paciente,'expediente'=>$expediente)
        );
    }
    
    public function mostrarUITratamientoAction(Request $request){
        $idConsulta = $request->get('idConsulta');
        return $this->render(':Medico:crearTratamiento.html.twig', array('idConsulta'=> $idConsulta));
    }
}
