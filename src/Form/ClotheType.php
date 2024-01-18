<?php

namespace App\Form;

use App\Entity\Clothe;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClotheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clothe', ChoiceType::class,[ 
                'choices' => [
                    'accessoire (chaussure, sac...)' => 'accessoire',
                    'bas' => 'bas',
                    'haut' => 'haut',
                    'robe' => 'robe',
                ],
                'label' => 'vêtements',
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('color', ChoiceType::class,[ 
                'choices' => [
                    'blanc' => 'blanc',
                    'bleu clair' => 'bleu clair',
                    'bleu marine' => 'bleu marine',
                    'gris' => 'gris',
                    'jaune' => 'jaune',
                    'marron' => 'marron',
                    'noir' => 'noir',
                    'rouge' => 'rouge',
                    'rose' => 'rose',
                    'vert'=> 'vert',
                ],
                'label' => 'couleur',
                'expanded' => true,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clothe::class,
        ]);
    }
}
