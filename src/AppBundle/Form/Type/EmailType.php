<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 27/04/16
 * Time: 8:08 AM
 */
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'email' ,    'email' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Email',
                    'ng-model'=> 'medico.email' ),
                'label' => 'Email',
                'required' => true ) )
            ->add( 'tipo' ,    'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Público, privado, etc',
                    'ng-model'=> 'medico.tipoEmail' ),
                'label' => 'Tipo de Email',
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
            'data_class'        => 'AppBundle\Entity\EmailMedico',
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
        return 'form_medico_email';
    }

}