<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input'
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'label_attr' => [
                    'class' => 'label'
                ],
                'attr' => [
                    'class' => 'input',
                    'rows' => '10'
                ],
            ])
            ->add('isStatus', CheckboxType::class)
            ->add('pathImg', FileType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
