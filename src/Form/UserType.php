<?php

namespace App\Form;

use App\Entity\Clothe;
use App\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('age')
            ->add('eyesColors', ChoiceType::class, [
                'choices' => [
                    'bleu' => 'bleu',
                    'gris' => 'gris',
                    'marron' => 'marron',
                    'noir' => 'noir',
                    'vert' => 'vert',
                    'vairon' => 'vairon'
                ],
                'label' => 'couleur des yeux',
            ])
            ->add('skinColor', ChoiceType::class, [
                'choices' => [
                    'très pâle' => 'très pâle',
                    'très claire' => 'très claire',
                    'claire' => 'claire',
                    'mat' => 'mat',
                    'foncée' => 'foncée',
                ],
                'label' => 'teinte de la peau',
            ])
            ->add('facepowder', CheckboxType::class, [
                'label' => 'fond de teint',
                'required' => false,
            ])
            ->add('lipStick', CheckboxType::class, [
                'label' => 'rouge à lèvres',
            ])
            ->add('eyeShadow', CheckboxType::class, [
                'label' => 'fard à paupières',
            ])
            ->add('highLighter', CheckboxType::class, [
                'label' => 'illuminateur',
            ])
            ->add('occasion', ChoiceType::class, [
                'choices' => [
                    'décontractée' => 'décontractée',
                    'grande occasion' => 'grande occasion',
                    'soirée' => 'soirée',
                ],
                'label' => 'style du jour',
            ])
            ->add('clothes', CollectionType::class, [
                'entry_type' => ClotheType::class, // Utilisez le type de formulaire associé à l'entité Clothe
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
