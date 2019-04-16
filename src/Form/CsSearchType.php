<?php

namespace App\Form;

use App\Entity\CsSearch;
use App\Entity\College;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CsSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('byCollege', EntityType::class, [
                'class' => College::class,

                'choice_label' => 'nom',
                
            ])
            ->add('distance', choiceType::class, [
                'choices' => [
                    '400 m' => 4
                ]
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CsSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}
