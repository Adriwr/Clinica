<?php

namespace AppBundle\Form\Type\Medico;

use AppBundle\Form\Type\Medico\MedicoType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicoRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'id',         'hidden' )
            ->remove('username')
            ->add('medico', new MedicoType() )
            ->add( 'email' ,   'email' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Correo electrónico',
                    'ng-model'=> 'medico.email' ),
                'label' => 'Email',
                'required' => true ) )
            ->add( 'Guardar', 'submit', array(
                'attr' => array(
                    'style'     =>'margin:5px',
                    'class'     => 'btn btn-primary pull-right',
                    'ng-click'  => 'crear()')) )
        ;

    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\User\User',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'form_agregar_medico';
    }
}