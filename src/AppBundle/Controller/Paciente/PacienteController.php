<?php

namespace AppBundle\Controller\Paciente;


use AppBundle\Document\Paciente\Paciente;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Paciente\PacienteType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class PacienteController extends Controller
{
    public function registrarPacienteAction(Request $request)
    {
        $paciente = new Paciente();
        $usuario = new User();

        $formPaciente = $this->createForm(new PacienteType(), $paciente);
        $formUsuario = $this->createForm(new RegistrationType(), $usuario);

        $formPaciente->handleRequest($request);
        $formUsuario->handleRequest($request);

        if($formUsuario->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_PACIENTE");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();

            if($formPaciente->isValid()){
                $paciente->setEmail($usuario->getEmail());
                $dm->persist($paciente);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }
        }

        return $this->render(
            ':Paciente/registrar:registrar_paciente.html.twig',
            array(
                'formPaciente' => $formPaciente->createView(),
                'formUsuario'=> $formUsuario->createView()
                )
        );
    }

}

