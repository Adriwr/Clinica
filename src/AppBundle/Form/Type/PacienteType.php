<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacienteType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'id',         'hidden' )
            ->add( 'nombre' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre',
                    'ng-model'=> 'paciente.nombre' ),
                'label' => 'Nombre',
                'required' => true ) )
            ->add( 'apellidos' ,     'money' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Apellidos',
                    'ng-model'=> 'paciente.apellidos' ),
                'label' => 'Apellidos',
                'required' => true ) )
            ->add( 'sexo' ,  'checkbox' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'paciente.sexo' ),
                'label' => 'Sexo',
                'required' => true ) )
            ->add( 'fechaNacimiento' ,  'date' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'paciente.fecha' ),
                'label' => 'Fecha de nacimiento',
                'required' => true ) )
            ->add( 'curp' ,  'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Curp',
                    'ng-model'=> 'paciente.curp' ),
                'label' => 'CURP',
                'required' => true ) )
            ->add( 'telefono' ,  'checkbox' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Telefono',
                    'ng-model'=> 'paciente.telefono' ),
                'label' => 'Stock',
                'required' => true ) )
            ->add( 'telefonoUrgencia' ,  'checkbox' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Telefono de urgencia',
                    'ng-model'=> 'paciente.telefonoUrgencia' ),
                'label' => 'Stock',
                'required' => true ) )
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
            'data_class'        => 'AppBundle\Entity\Paciente',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }

    /**
     * Función para obtener el nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_paciente';
    }

}