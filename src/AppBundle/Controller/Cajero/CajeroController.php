<?php

namespace AppBundle\Controller\Cajero;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\Consulta\Consulta;
use AppBundle\Document\Expediente\Expediente;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Cajero\CajeroPagoCitaType;
use AppBundle\Form\Type\Cajero\CajeroRegistrationType;
use AppBundle\Form\Type\Cajero\CajeroType;
use AppBundle\Form\Type\User\RegistrationType;
use MongoDBODMProxies\__CG__\AppBundle\Document\Paciente\Paciente;
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
            $dm = $this->get('doctrine_mongodb')->getManager();
            $pacientes = $dm->getRepository('AppBundle:Paciente\Paciente')
                ->findAll();
            foreach ($pacientes as $paciente){
                foreach ($pacientes->getCitas() as $cita1){
                    if($cita1->getFecha()==$cita->getFecha()&&$cita1->getConsultorio()==$cita->getConsultorio()){
                        $this->addFlash(
                            'notice',
                            'Pago registrado correctamente'
                        );
                        $consulta = new Consulta();
                        $consulta->setEstatus(1);
                        $consulta->setMedico($cita->getMedico());
                        $consulta->setFecha($cita->getFecha());
                        $exp = $paciente->getExpediente();
                        $exp->addConsulta($consulta);
                        $paciente->setExpediente($exp);
                        $dm->persist($paciente);
                        $dm->flush();
                        return $this->redirect($this->generateUrl('home'));

                    }

                }
            }
            $this->addFlash(
                'notice',
                'No existe la cita especificada'
            );


        }

        return $this->render(
            ':Cajero/pago:registrarPagoCita.html.twig',
            array(
                'formPagoCita' => $formPagoCita->createView()
            )
        );
    }

}
