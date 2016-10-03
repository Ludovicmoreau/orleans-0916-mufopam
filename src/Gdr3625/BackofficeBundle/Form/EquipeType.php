<?php

namespace Gdr3625\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('libelleAdresse')
            ->add('numeroRue')
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
