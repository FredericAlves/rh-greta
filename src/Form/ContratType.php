<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('greta', ChoiceType::class, array(
                'label' => 'Greta :',
                'choices' => array('GRETA NORD'=>'GRETA NORD','GRETA SUD'=>'GRETA SUD','GRETA EST'=>'GRETA EST'),
                'multiple' => false,
            ))
            ->add('typeDuree', ChoiceType::class, array(
                'label' => 'Type ( CDI/CDD) :',
                'choices' => array('CDI'=>'CDI','CDD'=>'CDD'),
                'multiple' => false,
            ))

            ->add('Valider', SubmitType::class)
        ;
    }
}