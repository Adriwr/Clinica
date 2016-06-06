<?php

namespace AppBundle\Controller\Enfermera;


use AppBundle\Document\Paciente\Paciente;
use AppBundle\Document\Paciente\PacienteCitas;
use AppBundle\Document\Enfermera\Enfermera;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Enfermera\EnfermeraRegistrationType;
use AppBundle\Form\Type\Paciente\PacienteRegistrationType;
use AppBundle\Form\Type\Enfermera\EnfermeraType;
use AppBundle\Form\Type\User\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\Paciente\CitaType;


class EnfermeraController extends Controller
{
    /**
     * Acción para mostrar el formulario de registro de enfermera
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarEnfermeraAction(Request $request)
    {
        $usuario = new User();
        
        $formUsuario = $this->createForm(new EnfermeraRegistrationType(),$usuario);

        $formUsuario->handleRequest($request);
        // Se registra datos del usuario
        if($formUsuario->isValid()){

            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_ENFERMERA");
            $usuario->setUsername($usuario->getEnfermera()->getNombre() . " " . $usuario->getEnfermera()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();

            return $this->redirect($this->generateUrl('registrar_enfermera'));

        }
        return $this->render(
            ':Enfermera:registrarEnfermera.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarPacienteAction(Request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new PacienteRegistrationType(), $usuario);

        $formUsuario->handleRequest($request);
        $valida_int = 0;
        if($formUsuario->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_PACIENTE");

            $valida = $this->get( 'doctrine_mongodb' )->getManager()
                ->getRepository('AppBundle:User\User')
                ->getAllUsers('paciente');

            $usuario->setUsername($usuario->getPaciente()->getNombre() . " " . $usuario->getPaciente()->getApellidos());
            $dm->persist($usuario);
            $data= $formUsuario->getData();
            foreach ($valida as $usuarioV){
                if($usuarioV["email"] == $data->getEmail()){
                    $valida_int = 1;
                }
            }
            if($valida_int == 0){
                $dm->flush();
            }
            return $this->redirect($this->generateUrl('registrar_paciente_enfermera', array('valida'=>$valida)));
        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Enfermera/registrar:registrarPaciente.html.twig',
            array(
                'formUsuario' => $formUsuario->createView())
        );
    }
    public function mostrarPacientesAction(Request $request)
    {
        $pacientes = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Paciente\Paciente' )
            ->getAll();
        return $this->render(':Enfermera:mostrarPacientes.html.twig', array('pacientes' => $pacientes));
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function agendarCitaPacienteAction(Request $request)
    {
        $cita = new PacienteCitas();

        $form = $this->createForm(new CitaType(), $cita);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get( 'doctrine_mongodb' )->getManager();
            $paciente = $dm->getRepository('AppBundle:User\User')->findOneBy(
                array("paciente.id" => $request->get('id'))
            );
            // aqui va vincular a usuario
            $paciente->getPaciente()->addCita($cita);
            $dm->persist($cita);
            $dm->flush();

            $request->getSession()->getFlashBag()->add(
                'exito',
                'Cita guardada'
            );

            return $this->redirect($this->generateUrl('mostrar_paceintes_enfermera'));

        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Enfermera/citas:agendar.html.twig',
            array('form' => $form->createView())
        );
    }

    public function consultarCitasEnfermeraAction(Request $request)
    {
        $pacientes = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Paciente\Paciente' )
            ->getAll();

        return $this->render(
            ':Enfermera/citas:consultarCitas.html.twig', array('pacientes'=>$pacientes)
        );
    }

}