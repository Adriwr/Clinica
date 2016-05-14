<?php

namespace AppBundle\Controller\Paciente;


use AppBundle\Document\Paciente\Paciente;
use AppBundle\Form\Type\Paciente\PacienteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class PacienteController extends Controller
{
    public  function registrarPacienteAction(Request $request)
    {
        $paciente = new Paciente();
        $form = $this->createForm(new PacienteType(), $paciente);
        $form->handleRequest($request);

        if($form->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($paciente);
            $dm->flush();
            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render(
            ':Paciente/registrar:registrar_paciente.html.twig',
            array('form' => $form->createView())
        );
    }

}

