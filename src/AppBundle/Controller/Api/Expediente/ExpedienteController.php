<?php


namespace AppBundle\Controller\Api\Expediente;

use AppBundle\Document\Expediente\Alergia;
use AppBundle\Document\Expediente\AntecedenteFamiliar;
use AppBundle\Document\Expediente\AntecedentePersonal;
use AppBundle\Document\Expediente\Anticonceptivo;
use AppBundle\Document\Expediente\Cirugia;
use AppBundle\Document\Expediente\Embarazo;
use AppBundle\Document\Expediente\Enfermedad;
use AppBundle\Document\Expediente\Expediente;
use AppBundle\Document\Expediente\Mastografia;
use AppBundle\Document\Expediente\Papanicolaou;
use AppBundle\Document\Paciente\Paciente;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class ExpedienteController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de los pacientes
     * El arreglo generado alimenta la tabla "Pacientes"
     *
     * @return array
     * @Rest\View()
     */
    public function postAction(Request $request){
        $expediente = $request->request->get('expediente');
        $dm = $this->get( 'doctrine_mongodb' )->getManager();

        /*if($expediente){
            $id =  $expediente['id'];
            $paciente =  $dm->getRepository('AppBundle:Paciente\Paciente')->find( $id );
            return $paciente;
        }*/
        $expedienteDoc = new Expediente();
        foreach($expediente['alergias'] as $elemento){
            $alergiaDoc = new Alergia();
            $alergiaDoc->setControlada($elemento['controlada']);
            $alergiaDoc->setFechaDiagnostico($elemento['fechaDiagnostico']);
            $alergiaDoc->setSustancia($elemento['sustancia']);
            $expedienteDoc->addAlergia($alergiaDoc);
        }

        foreach($expediente['antecedentesFam'] as $elemento){
            $anteFamDoc = new AntecedenteFamiliar();
            $anteFamDoc->setNombre($elemento['nombre']);
            $anteFamDoc->setSexo($elemento['sexo']);
            $anteFamDoc->setEdad($elemento['edad']);
            $anteFamDoc->setParentesco($elemento['parentesco']);
            $anteFamDoc->setTelefono($elemento['telefono']);
            //$anteFamDoc->setControlada($elemento['controlada']);
            //$anteFamDoc->setFechaDiagnostico($elemento['fechaDiagnostico']);
            if(array_key_exists('enfermedades', $elemento)){
                foreach($elemento['enfermedades'] as $enferme){
                    $enfermedad = new Enfermedad();
                    $enfermedad->setCodigoCie($enferme['codigo']);
                    $enfermedad->setNombre($enferme['nombre']);
                    $enfermedad->setFecha($enferme['fecha']);
                    $enfermedad->setTratada($enferme['tratada']);
                    $enfermedad->setObservaciones($enferme['observaciones']);
                    $anteFamDoc->addEnfermedadesCronica($enfermedad);
                }
            }

            $expedienteDoc->addAntedecentesFamiliare($anteFamDoc);
        }

        if(array_key_exists('antecedentesPer', $expediente)){
            $antePersoDoc = new AntecedentePersonal();
            $antePersoDoc->setFrecuenciaBano($expediente['antecedentesPer']['frecuenciaBano']);
            $antePersoDoc->setCambiosRopa($expediente['antecedentesPer']['cambiosRopa']);
            $antePersoDoc->setPersonasCasa($expediente['antecedentesPer']['personasCasa']);
            $antePersoDoc->setAlimentacion($expediente['antecedentesPer']['alimentacion']);
            //$antePersoDoc->setServiciosCasa($elemento['serviciosCasa']);
            $antePersoDoc->setFuma($expediente['antecedentesPer']['fuma']);
            $antePersoDoc->setAlcohol($expediente['antecedentesPer']['alcohol']);
            $antePersoDoc->setDrogas($expediente['antecedentesPer']['drogas']);
            $expedienteDoc->addAntecedentesPersonale($antePersoDoc);
        }

        foreach($expediente['anticonceptivos'] as $elemento){
            $anticonceptivo = new Anticonceptivo();
            $anticonceptivo->setNombre($elemento['nombre']);
            $expedienteDoc->addAnticonceptivo($anticonceptivo);
        }

        foreach($expediente['cirugias'] as $elemento){
            $cirugia = new Cirugia();
            $cirugia->setTipo($elemento['tipo']);
            $cirugia->setFecha($elemento['year']);
            $cirugia->setEstado($elemento['estado']);
            $cirugia->setLugar($elemento['lugar']);
            $expedienteDoc->addCirugia($cirugia);
        }

        foreach($expediente['embarazos'] as $elemento){
            $embarazo = new Embarazo();
            $embarazo->setFecha($elemento['fecha']);
            $embarazo->setDescripcion($elemento['descripcion']);
            $expedienteDoc->addEmbarazo($embarazo);
        }
        foreach($expediente['enfermedades'] as $elemento){
            $enfermedad = new Enfermedad();
            $enfermedad->setCodigoCie($elemento['codigo']);
            $enfermedad->setNombre($elemento['nombre']);
            $enfermedad->setFecha($elemento['fecha']);
            $enfermedad->setTratada($elemento['tratada']);
            $enfermedad->setObservaciones($elemento['observaciones']);
            $expedienteDoc->addEnfermedadesCronica($enfermedad);
        }

        foreach($expediente['mastografias'] as $elemento){
            $mastografia = new Mastografia();
            $mastografia->setFecha($elemento['year']);
            $mastografia->setNotas($elemento['notas']);
            $expedienteDoc->addMastografia($mastografia);
        }

        foreach($expediente['papanicolaous'] as $elemento){
            $papanico = new Papanicolaou();
            $papanico->setFecha($elemento['year']);
            $papanico->setNotas($elemento['notas']);
            $expedienteDoc->addPapanicolaous($papanico);
        }
        //return $expedienteDoc;
        //$paciente->setExpediente($expedienteDoc);
        $dm->persist($expedienteDoc);
        $dm->flush();
        return array(
            "mensaje" => "exito"
        );
    }


}

