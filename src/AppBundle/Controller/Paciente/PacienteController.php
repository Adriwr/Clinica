<?php

namespace AppBundle\Controller\Paciente;


use AppBundle\Document\Paciente\Paciente;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Paciente\PacienteRegistrationType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class PacienteController extends Controller
{
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
            ':Paciente/registrar:registrarPaciente.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }

}

