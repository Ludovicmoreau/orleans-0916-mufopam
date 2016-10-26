<?php

namespace Gdr3625\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Gdr3625\BackofficeBundle\Entity\Equipe;
use Gdr3625\BackofficeBundle\Entity\Keywords;

class EquipeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        dump('keywordsEquipes');
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
            ->add('keywordsEquipe','entity',array(
                'class' => 'Gdr3625BackofficeBundle:Keywords',
                'property' => 'keyword',
                'expanded' => true,
                'multiple' => true
                )
            )
            /*,ChoiceType::class,array('choices' => array(
                ' '=>'Selectionnez les mots clés',
                'toto' =>  'Actualités',
                'Jobs' => 'Stages - Contrats',
                'Events' => 'Evènements',
            ),))*/
            ->add('logo', FileType::class, array('required' => false))
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
