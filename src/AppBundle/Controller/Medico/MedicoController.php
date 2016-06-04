<?php

namespace AppBundle\Controller\Medico;

use AppBundle\Document\Medico\Medico;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Medico\MedicoRegistrationType;
use AppBundle\Form\Type\Medico\MedicoType;
use AppBundle\Form\Type\User\RegistrationType;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function consultarCitas(Request $request)
    {

    }
}
