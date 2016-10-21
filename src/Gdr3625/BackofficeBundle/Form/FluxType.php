<?php

namespace Gdr3625\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FluxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('contenu')
            ->add('datePublication', DateType::class, array('widget' => "single_text"))
            ->add('typeFlux',ChoiceType::class, array(
                        'choices' => array(
                            'Actus' =>  'Actualités',
                            'Jobs' => 'Stages - Contrats',
                            'Events' => 'Evènements',
                        ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gdr3625\BackofficeBundle\Entity\Flux'
        ));
    }
}
