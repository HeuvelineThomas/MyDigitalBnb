<?php

namespace App\Form;


use App\Entity\Housing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HousingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title_housing')
            ->add('description_housing')
            ->add('disponibility_housing' , DateTimeType::class, [
                'widget' => 'single_text',
                ])
            ->add('price_per_night_housing')
            ->add('street_housing')
            ->add('post_code_housing')
            ->add('city_housing')
            ->add('type_housing')
            ->add('img_housing', FileType::class, [
                'label' => 'Download an image',
                'data_class' => null            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}
