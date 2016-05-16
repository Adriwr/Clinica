<?php

namespace AppBundle\Form\Type\Enfermera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnfermeraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre(s)',
                    'ng-model'=> 'enfermera.nombre' ),
                'label' => 'Nombre',
                'required' => true ))
            ->add('apellidos', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Apellidos',
                    'ng-model'=> 'enfermera.apellidos' ),
                'label' => 'Apellidos',
                'required' => true ) )
            ->add('sexo', 'choice' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'enfermera.sexo' ),
                'label' => 'Sexo',
                'required' => true ,
                'choices'  => array('m' => 'Masculino', 'f' => 'Femenino'))
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Enfermera\Enfermera',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form_agregar_enfermera';
    }
}