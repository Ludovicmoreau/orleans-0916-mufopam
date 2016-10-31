<?php

namespace Gdr3625\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Gdr3625\BackofficeBundle\Form\KeywordsType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                            ' '=>'Selectionnez le type de flux',
                            'Actus' =>  'Actualités',
                            'Jobs' => 'Stages - Contrats',
                            'Events' => 'Evènements',
                        ),
            ))
            ->add('keywordsFlux', CollectionType::class, array(
                'entry_type' => EntityType::class,
                'entry_options' => array(
                    'class' => 'Gdr3625BackofficeBundle:Keywords',
                    'choice_label' => 'keyword',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => false,
                ),
                'allow_add'=> true,
                'allow_delete'=> true,
                'required'=>false,
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
