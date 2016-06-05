<?php

namespace AppBundle\Controller\Cajero;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\Consulta\Consulta;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Cajero\CajeroPagoCitaType;
use AppBundle\Form\Type\Cajero\CajeroRegistrationType;
use AppBundle\Form\Type\Cajero\CajeroType;
use AppBundle\Form\Type\User\RegistrationType;
use MongoDBODMProxies\__CG__\AppBundle\Document\Paciente\PacienteCitas;
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

    /**
     * Acción para mostrar el formulario de registro de cajero
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarPagoCitaAction(request $request)
    {
        $cita = new PacienteCitas();

        $formPagoCita = $this->createForm(new CajeroPagoCitaType(),$cita);

        $formPagoCita->handleRequest($request);

        if($formPagoCita->isValid()){
            echo 'lel';
            print_r($cita);
            echo 'lel';
            $dm = $this->get('doctrine_mongodb')->getManager();
            $cita = $dm->getRepository('AppBundle:Paciente\PacienteCitas')
                ->findOneBy(array(
                    'fecha'=>$cita->getFecha(),
                    'consultorio'=>$cita->getConsultorio()
                ));
            if(!isset($cita)){
                $this->addFlash(
                    'notice',
                    'No existe la cita especificada'
                );
            }
            else {
                $this->addFlash(
                    'notice',
                    'Pago registrado correctamente'
                );
                $cita->setEstatus(1);
                $dm->persist($cita);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }


        }

        return $this->render(
            ':Cajero/pago:registrarPagoCita.html.twig',
            array(
                'formPagoCita' => $formPagoCita->createView()
            )
        );
    }

}
