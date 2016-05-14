<?php

namespace AppBundle\Controller\Medico;

use AppBundle\Document\Medico\Medico;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Medico\MedicoType;
use AppBundle\Form\Type\User\RegistrationType;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MedicoController extends Controller
{
    /**
     * @Route("/", name="medico")
     */
    public function registrarMedicoAction(Request $request)
    {
        $medico = new Medico();
        $usuario = new User();


        $formMedico = $this->createForm(new MedicoType(), $medico);
        $formMedico->handleRequest($request);

        $formUsuario = $this->createForm(new RegistrationType(), $usuario);
        $formUsuario->handleRequest($request);

        if ($formUsuario->isValid()) {

            $dm = $this->getDoctrine()->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_MEDICO");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();

            if($formMedico->isValid()){
                $dm = $this->getDoctrine()->getManager();

                $dm->persist($medico);
                $dm->flush();

                $request->getSession()->getFlashBag()->add(
                    'exito',
                    'Medico creado'
                );

                return $this->redirect($this->generateUrl('medico'));
            }

        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Medico:registrarMedico.html.twig',
            array(
                'formMedico' => $formMedico->createView(),
                'formUsuario' => $formUsuario->createView()
                )
        );
    }
}
