<?php

namespace App\Form;

use App\Entity\BienImmobilier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienImmobilierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numimmo')
            ->add('status')
            ->add('prix')
            ->add('etat')
            ->add('date')
            ->add('proprietaire')
            ->add('Ajouter',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BienImmobilier::class,
        ]);
    }
}
