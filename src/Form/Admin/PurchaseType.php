<?php

namespace App\Form\Admin;

use App\Entity\Admin\Purchase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Admin\Product;

class PurchaseType extends AbstractType
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
            ->add('stock_in',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            // ->add('stock_in')
            // ->add('stock_left')
            ->add('unit_cost',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            // ->add('total_cost')
            // ->add('create_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Purchase::class,
        ]);
    }
}
