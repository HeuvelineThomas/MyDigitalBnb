<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class)
            //->add('roles')
            ->add('password')
            ->add('firstnam_user')
            ->add('name_user')
            ->add('phone_number_user')
            ->add('created_at')
            ->add('updated_at')
            ->add('street_user')
            ->add('post_code_user')
            ->add('city_user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
