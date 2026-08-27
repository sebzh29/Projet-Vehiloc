<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('monthlyPrice', IntegerType::class, [
                'label' => 'Prix mensuel',
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('dailyPrice', IntegerType::class, [
                'label' => 'Prix journalier',
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('places', ChoiceType::class, [
                'label' => 'Nombre de places',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                ],
            ])
            ->add('motor', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle' => 'Manuelle',
                    'Automatique' => 'Automatique',
                ],
            ]);
    }

    public function configureOptions(
        OptionsResolver $resolver
    ): void {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}