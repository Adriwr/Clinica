<?php

namespace AppBundle\Form\Type\Cajero;

use AppBundle\Form\Type\Medico\MedicoType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 *
 * Class CajeraRegistrationType
 * @package AppBundle\Form\Type\Cajero
 */
class CajeroBuscarProductoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'nombre' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del medicamento',
                    'ng-model' => 'nombre'
                    ),
                'label' => 'Nombre del medicamento',

                'required' => true ) )
        ->add( 'Buscar', 'button', array(
            'attr' => array(
                'style'     =>'margin:5px',
                'class'     => 'btn btn-primary pull-right',
                'ng-click'  => 'buscarMedicamento()')) );
    }

    /**
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
     * @return string
     */
    public function getName()
    {
        return 'form_buscar_producto';
    }
}