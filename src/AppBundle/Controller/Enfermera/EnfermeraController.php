<?php

namespace AppBundle\Controller\Enfermera;

use AppBundle\Document\Enfermera\Enfermera;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Enfermera\EnfermeraRegistrationType;
use AppBundle\Form\Type\Paciente\PacienteRegistrationType;
use AppBundle\Form\Type\Enfermera\EnfermeraType;
use AppBundle\Form\Type\User\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function registrarPacienteAction(Request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new PacienteRegistrationType(), $usuario);

        $formUsuario->handleRequest($request);

        if($formUsuario->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_PACIENTE");
            $usuario->setUsername($usuario->getPaciente()->getNombre() . " " . $usuario->getPaciente()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();


            return $this->redirect($this->generateUrl('registrar_paciente'));

        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Enfermera/registrar:registrarPaciente.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }
}