<?php

namespace App\Form;

use App\Entity\Voiture;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Immatriculation')
            ->add('marque')
            ->add('modele')
            ->add('anneeProduction',DateTimeType::class,[
                'widget'=>'single_text'
            ])
            ->add('carburant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
