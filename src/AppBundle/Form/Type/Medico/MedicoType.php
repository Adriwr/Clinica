<?php

namespace AppBundle\Form\Type\Medico;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicoType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'nombre' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre(s)',
                    'ng-model'=> 'medico.nombre' ),
                'label' => 'Nombre',
                'required' => true ) )
            ->add( 'apellidos' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Apellidos',
                    'ng-model'=> 'medico.apellidos' ),
                'label' => 'Apellidos',
                'required' => true ) )
            ->add('sexo', 'choice' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'medico.sexo' ),
                'label' => 'Sexo',
                'required' => true ,
                'choices'  => array('m' => 'Masculino', 'f' => 'Femenino')))
            ->add('fecha_nacimiento', 'date' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'medico.fecha_nacimiento' ),
                'label' => 'Fecha de nacimiento',
                'required' => true
            ))
            ->add('telefonoParticular', 'number' , array(
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'telefono Particular',
                        'ng-model'=> 'medico.telefonoParticular' ),
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
            )
            ->add( 'Guardar', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary pull-right',
                    'ng-click'=> 'crear()')) )

        ;
    }

    /**
     * Función para agregar la opción data_class
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=> 'AppBundle\Document\Medico\Medico',

        ));
    }

    /**
     * Función para obtener el nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_medico';
    }

}