<?php

namespace AppBundle\Controller\Enfermera;

use AppBundle\Document\Enfermera\Enfermera;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Enfermera\EnfermeraType;
use AppBundle\Form\Type\User\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EnfermeraController extends Controller
{
    public function registrarEnfermeraAction(Request $request)
    {
        $enfermera = new Enfermera();
        $usuario = new User();
        
        $formEnfermera = $this->createForm(new EnfermeraType(), $enfermera);
        $formEnfermera->handleRequest($request);
        $formUsuario = $this->createForm(new RegistrationType(),$usuario);

        if($formUsuario->isValid()){
            $dm = $this->getDoctrine()->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_MEDICO");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();
            if($formEnfermera->isValid()){
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($enfermera);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }
            
        }
        return $this->render(
            ':Enfermera:registrarEnfermera.html.twig',
            array('formEnfermera' => $formEnfermera->createView(),
                'formUsuario' => $formUsuario->createView()

            )
        );
    }
}