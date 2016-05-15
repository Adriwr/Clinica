<?php

namespace AppBundle\Form\Type\Producto;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType{

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
                    'placeholder' => 'Nombre del producto',
                    'ng-model'=> 'producto.nombre' ),
                'label' => 'Nombre',
                'required' => true ) )
            ->add( 'precio' ,     'money' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Precio del producto',
                    'ng-model'=> 'producto.precio' ),
                'label' => 'Precio',
                'required' => true ) )
            ->add( 'stock' ,  'number' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Número de productos en existencia',
                    'ng-model'=> 'producto.stock' ),
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
            'data_class'        => 'AppBundle\Document\Producto\Producto',
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
        return 'form_producto';
    }

}