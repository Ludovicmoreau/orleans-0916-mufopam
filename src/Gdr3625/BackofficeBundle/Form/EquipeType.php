<?php

namespace Gdr3625\BackofficeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Gdr3625\BackofficeBundle\Entity\Equipe;
use Gdr3625\BackofficeBundle\Entity\Keywords;
use Gdr3625\BackofficeBundle\Form\KeywordsType;

class EquipeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEquipe')
            ->add('laboratoire')
            ->add('rue')
            ->add('cp')
            ->add('ville')
            ->add('codeUnite')
            ->add('tutelle')
            ->add('siteWebEquipe')
            ->add('siteWebLabo')
            ->add('nomReferent')
            ->add('prenomReferent')
            ->add('emailReferent')
            ->add('telephoneReferent')
            ->add('recherche')
            ->add('projet')
            ->add('descriptionEquipe')
            ->add('keywordsEquipe', 'collection', array(
                'entry_type' => 'entity',
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
                'prototype' => true,
                'prototype_name' => '__keywords__',
            ))
            ->add('equipePublication', 'collection', array(
                'entry_type' => 'entity',
                'entry_options' => array(
                    'class' => 'Gdr3625BackofficeBundle:Publications',
                    'choice_label' => 'doi',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => false,
                                        ),
                'allow_add'=> true,
                'allow_delete'=> true,
                'required'=>false,
                'prototype' => true,
                'prototype_name' => '__publications__',
            ))
            ->add('logo', 'file', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gdr3625\BackofficeBundle\Entity\Equipe'
        ));
    }
}
