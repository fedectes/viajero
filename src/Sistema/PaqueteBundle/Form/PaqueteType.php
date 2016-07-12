<?php

namespace Sistema\PaqueteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaqueteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('origen')
            ->add('destino')
            ->add('temporada')
            ->add('fecha_partida', 'date')
            ->add('hora_partida', 'time')    
            ->add('fecha_llegada', 'date', array('input' => 'datetime',
                                                 'widget' => 'choice',))
            ->add('hora_llegada', 'time', array('input' => 'datetime',
                                                 'widget' => 'choice',))
            ->add('dias')
            ->add('disponibilidad')
            ->add('precio')
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\PaqueteBundle\Entity\Paquete'
        ));
    }

    public function getName()
    {
        return 'sistema_paquetebundle_paquetetype';
    }
}
