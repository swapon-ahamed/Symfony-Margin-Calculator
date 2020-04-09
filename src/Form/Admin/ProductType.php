<?php

namespace App\Form\Admin;

use App\Entity\Admin\Product;
use App\Entity\Admin\Purchase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            // ->add('create_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
