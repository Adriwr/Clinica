<?php

namespace AppBundle\Form\Type\Paciente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacienteType extends AbstractType
{
    public  function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('nombre', 'text' , array(
               'attr' => array(
                   'class' => 'form-control',
                   'placeholder' => 'Nombre del paciente',
                   'ng-model'=> 'paciente.nombre' ),
               'label' => 'Nombre del paciente',
               'required' => true ) )
           ->add('apellidos', 'text' , array(
               'attr' => array(
                   'class' => 'form-control',
                   'placeholder' => 'Apellidos',
                   'ng-model'=> 'paciente.apellidos' ),
               'label' => 'Apellidos',
               'required' => true ) )
           ->add('sexo', 'choice' , array(
               'attr' => array(
                   'class' => 'form-control',
                   'ng-model'=> 'paciente.sexo' ),
               'label' => 'Sexo',
               'required' => true ,
               'choices'  => array('m' => 'Masculino', 'f' => 'Femenino')
               )
           )
           ->add('fecha_nacimiento', 'date' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'ng-model'=> 'paciente.fecha_nacimiento' ),
                   'label' => 'Fecha de nacimiento',
                   'required' => true
               ))
           ->add('calle', 'text' , array(
               'attr' => array(
                   'class' => 'form-control',
                   'placeholder' => 'Calle',
                   'ng-model'=> 'paciente.calle' ),
               'label' => 'Calle',
               'required' => true )
           )
           ->add('numero', 'text' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'placeholder' => 'Número de casa',
                       'ng-model'=> 'paciente.numero' ),
                   'label' => 'Número de casa',
                   'required' => true )
           )
           ->add('colonia', 'text' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'placeholder' => 'Colonia',
                       'ng-model'=> 'paciente.colonia' ),
                   'label' => 'Colonia',
                   'required' => true )
           )
           ->add('estado', 'choice' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'ng-model'=> 'paciente.estado' ),
                   'label' => 'Estado',
                   'required' => true,
                   'choices'  => array(
                       'Aguascalientes' => 'Aguascalientes',
                        'Baja California' => 'Baja California',
                       'Baja California Sur	' => 'Baja California Sur',
                       'Campeche' => 'Campeche',
                       'Coahuila de Zaragoza	' => 'Coahuila de Zaragoza	',
                       'Colima' => 'Colima',
                       'Chiapas' => 'Chiapas',
                       'Chihuahua' => 'Chihuahua',
                       'Distrito Federal' => 'Distrito Federal	',
                       'Durango' => 'Durango',
                       'Guanajuato' => 'Guanajuato',
                       'Guerrero' => 'Guerrero',
                       'Hidalgo' => 'Hidalgo',
                       'Jalisco' => 'Jalisco',
                       'México' => 'México',
                       'Michoacán de Ocampo	' => 'Michoacán de Ocampo',
                       'Morelos' => 'Morelos',
                       'Nayarit' => 'Nayarit',
                       'Nuevo León	' => 'Nuevo León	',
                       'Oaxaca' => 'Oaxaca',
                       'Puebla' => 'Puebla',
                       'Querétaro' => 'Querétaro',
                       'Quintana Roo' => 'Quintana Roo	',
                       'San Luis Potosí	' => 'San Luis Potosí	',
                       'Sinaloa' => 'Sinaloa',
                       'Sonora' => 'Sonora',
                       'Tabasco' => 'Tabasco',
                       'Tamaulipas' => 'Tamaulipas',
                       'Tlaxcala' => 'Tlaxcala',
                       'Veracruz de Ignacio de la Llave	' => 'Veracruz de Ignacio de la Llave	',
                       'Yucatán' => 'Yucatán',
                       'Zacatecas' => 'Zacatecas',

                   )
               )
           )
           ->add('pais', 'country' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'placeholder' => 'País',
                       'ng-model'=> 'paciente.pais' ),
                   'label' => 'Pais',
                   'required' => true )
           )
           ->add('telefonoParticular', 'number' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'placeholder' => 'telefonoParticular',
                       'ng-model'=> 'paciente.telefonoParticular' ),
                   'label' => 'Télefono particular',
                   'required' => true )
           )
           ->add('telefonoEmergencia', 'number' , array(
                   'attr' => array(
                       'class' => 'form-control',
                       'placeholder' => 'telefono de emergencia',
                       'ng-model'=> 'paciente.telefonoEmergencia' ),
                   'label' => 'Télefono de emergencia',
                   'required' => true )
           );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Paciente\Paciente',
        ));
    }
    public function getName()
    {
        return 'form_agregar_paciente';
    }
}