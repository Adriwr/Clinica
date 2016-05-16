<?php

namespace AppBundle\Form\Type\Gerente;

use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GerenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'nombre' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre(s)',
                    'ng-model'=> 'gerente.nombre' ),
                'label' => 'Nombre',
                'required' => true ) )
            ->add( 'apellidos' ,   'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Apellidos',
                    'ng-model'=> 'gerente.apellidos' ),
                'label' => 'Apellidos',
                'required' => true )
            );
        ;

    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Gerente\Gerente'
        ));
    }
    public function getName()
    {
        return 'form_agregar_gerente';
    }
}