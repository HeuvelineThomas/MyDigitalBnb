<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arrival_date_reservation', DateTimeType::class, [
                'widget' => 'single_text',
                ])
            ->add('departude_date_reservation', DateTimeType::class, [
                'widget' => 'single_text',
                ])  
            ->add('date_reservation', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => array(
                    'readonly' => true,
                ),
                ]) 
            ->add('reservation_housing', TextType::class, [
            'attr' => array(
                'readonly' => true,
            ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
