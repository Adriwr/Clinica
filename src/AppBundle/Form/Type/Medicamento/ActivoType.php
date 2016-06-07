<?php

namespace AppBundle\Form\Type\Medicamento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivoType extends AbstractType{

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
                    'ng-model'=> 'activo.nombre' ),
                'label' => 'Nombre',
                'required' => true ) )
            ->add( 'cantidad' ,     'number' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Cantidad del ingrediente activo',
                    'ng-model'=> 'activo.cantidad' ),
                'label' => 'Cantidad',
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
            'data_class'        => null,
            'csrf_protection'   => false,
            'cascade_validation' => false,
            'allow_add' => true
        ));
    }

    /**
     * Función para obtener el nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_activo';
    }

}