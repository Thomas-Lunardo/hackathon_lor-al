<?php

namespace App\Form;

use App\Entity\Clothe;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('age')
            ->add('eyesColors')
            ->add('skinColor')
            ->add('facepowder')
            ->add('lipStick')
            ->add('eyeShadow')
            ->add('highLighter')
            ->add('occasion')
            ->add('clothes', CollectionType::class, [
                'entry_type' => ClotheType::class, // Utilisez le type de formulaire associé à l'entité Clothe
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
