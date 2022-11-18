<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Nouveau mail',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Nouveau mot de passe',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
