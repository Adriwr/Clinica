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
class CajeroPagoCitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha','datetime', array(
                'label' => 'Fecha y hora de cita',
                'required' => true ))
            ->add('consultorio','choice', array(
                'attr' =>array(
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 12),
                'label' => 'Consultorio',
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12
                ),
                'required' => true))
            ->add('save', 'submit', array('label' => 'Registrar pago'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Paciente\PacienteCitas',
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
        return 'form_pago_cita';
    }
}