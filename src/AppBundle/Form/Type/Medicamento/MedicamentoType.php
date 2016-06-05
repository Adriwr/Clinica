<?php

namespace AppBundle\Form\Type\Medicamento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicamentoType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'id',         'hidden' )
            ->add( 'nombreComercial' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre comercial',
                    'ng-model'=> 'medicamento.nombreComercial' ),
                'label' => 'Nombre comercial',
                'required' => true ) )
            ->add( 'precio' ,     'money' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Precio del medicamento',
                    'ng-model'=> 'medicamento.precio' ),
                'label' => 'Precio',
                'required' => true ) )
            ->add( 'laboratorio' ,     'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Laboratorio',
                    'ng-model'=> 'medicamento.laboratorio' ),
                'label' => 'Laboratorio',
                'required' => true ) )
            ->add( 'presentacion' ,  'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Presentación',
                    'ng-model'=> 'medicamento.presentacion' ),
                'label' => 'Presentación',
                'required' => true ) )
            ->add( 'cantidad' ,  'number' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Cantidad de presentación',
                    'ng-model'=> 'medicamento.cantidad' ),
                'label' => 'Cantidad',
                'required' => true ) )
            ->add( 'existencias' ,  'number' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Número de medicamentos en existencia',
                    'ng-model'=> 'medicamento.existencias' ),
                'label' => 'Existencias',
                'required' => true ) )
            ->add( 'Agregar ingrediente activo', 'button', array(
                'attr' => array(
                    'class' => 'btn btn-success',
                    'onClick'=> 'addActivo();')) )
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
            'data_class'        => 'AppBundle\Document\Medicamento\Medicamento',
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
        return 'form_medicamento';
    }

}