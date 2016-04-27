<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DireccionType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'id',         'hidden' )
            ->add( 'calle' ,     'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Calle',
                    'ng-model'=> 'direccion.calle' ),
                'label' => 'Calle',
                'required' => true ) )
            ->add( 'num_int' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Número interior',
                    'ng-model'=> 'direccion.num_ext' ),
                'label' => 'Número interior',
                'required' => true ) )
            ->add( 'num_ext' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Número exterior',
                    'ng-model'=> 'direccion.num_int' ),
                'label' => 'Número exterior',
                'required' => true ) )
            ->add( 'colonia' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Colonia',
                    'ng-model'=> 'direccion.colonia' ),
                'label' => 'Colonia',
                'required' => true ) )
            ->add( 'localidad' , 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Localidad',
                    'ng-model'=> 'direccion.localidad' ),
                'label' => 'Localidad',
                'required' => true ) )
            ->add( 'municipio' , 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Municipio',
                    'ng-model'=> 'direccion.municipio' ),
                'label' => 'Municipio',
                'required' => true ) )
            ->add( 'cp' ,        'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Código Postal',
                    'ng-model'=> 'direccion.cp' ),
                'label' => 'Código Postal',
                'required' => true ) )
            ->add( 'estado' , 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Estado',
                    'ng-model'=> 'direccion.estado' ),
                'label' => 'Estado',
                'required' => true ) )
        ;
    }

    /**
     * Función para agregar la opción data_class
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Entity\Direccion',
            'csrf_protection'   => false,
            'cascade_validation' => true
        ));
    }

    /**
     * Función para obtener el nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_direccion';
    }

}