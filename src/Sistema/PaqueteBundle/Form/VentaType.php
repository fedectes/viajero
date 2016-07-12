<?php

namespace Sistema\PaqueteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('fecha', 'date')
            ->add('paquete', 'entity', array(
                'class' => 'Sistema\PaqueteBundle\Entity\Paquete',
                'property' => 'nombre',
                'label' => 'Paquete de Viaje',
                'required' => false,
                'empty_value' => 'Seleccione Paquete'
                
            ))
            ->add('cliente', 'entity', array(
                'class' => 'Sistema\ClienteBundle\Entity\Cliente',
                'property' => 'dni',
                'label' => 'Dni del Cliente',
                'required' => false,
                'empty_value' => 'Seleccione Cliente'
                
            ))
            //->add('total')
                
                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\PaqueteBundle\Entity\Venta'
        ));
    }

    public function getName()
    {
        return 'sistema_paquetebundle_ventatype';
    }
}
