<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Formulaire d'inscription utilisateur.
 * Définit les champs à afficher et leur configuration.
 */
class FormuType extends AbstractType
{
    /**
     * Construit le formulaire avec les champs nécessaires.
     *
     * @param FormBuilderInterface $builder Constructeur du formulaire
     * @param array $options Options du formulaire
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Champ du nom/prénom
            ->add('surname')
            // Champ email
            ->add('email')
            // Champ mot de passe
            ->add('password')
        ;
    }

    /**
     * Configure les options du formulaire (entité associée).
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Associe le formulaire à l'entité User
            'data_class' => User::class,
        ]);
    }
}
