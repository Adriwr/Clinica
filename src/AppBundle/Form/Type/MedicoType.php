<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            ->add( 'id',         'hidden' )
            ->add( 'curp' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Clave Única de Registro de Población',
                    'ng-model'=> 'medico.curp' ),
                'label' => 'CURP',
                'required' => true ) )
            ->add( 'rfc' ,     'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Registro Federal de Contribuyentes',
                    'ng-model'=> 'medico.rfc' ),
                'label' => 'RFC',
                'required' => true ) )
            ->add( 'cedulaProfesional' ,     'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Número de cedula',
                    'ng-model'=> 'medico.cedulaProfesinal' ),
                'label' => 'Cedula Profesional',
                'required' => true ) )
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
            ->add('emails', 'collection', array('type' => new EmailType()))
            ->add( 'password' ,   'password' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                    'ng-model'=> 'medico.password' ),
                'label' => 'Password',
                'required' => true ) )
            ->add('telefonos', 'collection', array('type' => new TelefonoType()))
            ->add( 'direccion', new DireccionType())
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
            'data_class'        => 'AppBundle\Entity\Medico',
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
        return 'form_medico';
    }

}