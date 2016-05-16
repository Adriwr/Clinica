<?php

namespace AppBundle\Controller\Cajero;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Cajero\CajeroRegistrationType;
use AppBundle\Form\Type\Cajero\CajeroType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CajeroController
 * @package AppBundle\Controller\Cajero
 */
class CajeroController extends Controller
{
    /**
     * Acción para mostrar el formulario de registro de cajero
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarCajeroAction(request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new CajeroRegistrationType(),$usuario);

        $formUsuario->handleRequest($request);

        if($formUsuario->isValid()){

            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_CAJERO");
            $usuario->setUsername($usuario->getCajero()->getNombre() . " " . $usuario->getCajero()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();

            return $this->redirect($this->generateUrl('registrar_cajero'));

        }

        return $this->render(
            ':Cajero/registrar:registrarCajero.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }

}
