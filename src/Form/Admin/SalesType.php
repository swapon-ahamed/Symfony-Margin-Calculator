<?php

namespace App\Form\Admin;

use App\Entity\Admin\Sales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Admin\Product;
class SalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product',EntityType::class,[
                'class' => Product::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('unit_price',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('quantity',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sales::class,
        ]);
    }
}
