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
            date_default_timezone_set ('America/Mexico_City');
            $date = $cita->getFecha()->format('Y-m-d');
            $h = $cita->getFecha()->format('H') * 60 * 60;
            $m = $cita->getFecha()->format('i') * 60;
            if(strtotime($date)+$h+$m<time()){
                $this->addFlash(
                    'notice',
                    'La cita expiró'
                );
            }
            else {
                $dm = $this->get('doctrine_mongodb')->getManager();
                $usuarios = $dm->getRepository('AppBundle:User\User')
                    ->findAll();
                foreach ($usuarios as $usuario) {
                    if (($paciente = $usuario->getPaciente())!=null) {
                        foreach ($paciente->getCitas() as $cita1) {
                            if ($cita1->getFecha() == $cita->getFecha() && $cita1->getConsultorio() == $cita->getConsultorio()) {
                                $consulta = new Consulta();
                                $consulta->setEstatus(1);
                                echo $cita1->getMedico();
                                $medico = $dm->getRepository('AppBundle:User\User')
                                    ->findOneBy(array('username'=>$cita1->getMedico()));
                                $consulta->setMedico($medico->getMedico());
                                $consulta->setFecha($cita->getFecha());
                                if ($paciente->getExpediente() == null) {
                                    $exp = new Expediente();
                                    $paciente->setExpediente($exp);
                                }
                                $exp = $paciente->getExpediente();
                                $exp->addConsulta($consulta);
                                $paciente->setExpediente($exp);
                                $usuario->setPaciente($paciente);
                                $dm->persist($usuario);
                                $dm->flush();
                                $this->addFlash(
                                    'notice',
                                    'Pago registrado correctamente\nFecha y hora de cita: ' . $cita->getFecha()->format('Y/m/d H:i:s') . '\nConsultorio: ' . $cita->getConsultorio()
                                );
                                return $this->redirect($this->generateUrl('home'));

                            }

                        }
                    }
                }
                $this->addFlash(
                    'notice',
                    'Cita no existe'
                );
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
