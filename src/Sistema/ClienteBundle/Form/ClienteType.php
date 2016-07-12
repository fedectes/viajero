<?php

namespace Sistema\ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormError;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni')
            ->add('nombrec')
            ->add('apellidoc')
            ->add('direccion', 'textarea')
            ->add('telefono')
            ->add('fecha_nacim','birthday', array('years' => range(1902, date('Y'))))
            ->add('email', 'email')
        ;
        $builder->add('acepto', 'checkbox', array('mapped' => false));
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\ClienteBundle\Entity\Cliente'
        ));
    }

    public function getName()
    {
        return 'sistema_clientebundle_clientetype';
    }
}
