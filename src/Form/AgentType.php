<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom :'])
            ->add('prenom', TextType::class, ['label' => 'Prénom :'])
            ->add('datedenaissance', BirthdayType::class, array(
                'format' => 'dd-MM-yyyy',
                'years' => range(date('Y'), date('Y')-120),
                'label' => 'Date de naissance :',
                'placeholder' => array(
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'
                ),
            ))
            ->add('sexe', ChoiceType::class, array(
                'label' => 'Sexe :',
                'choices' => array('Homme'=>'Homme','Femme'=>'Femme'),
                'multiple' => false,
            ))
            ->add('fonction', ChoiceType::class, array(
                'label' => 'Fonction:',
                'choices' => array('Assistante administrative'=>'Assistante administrative','Assistante de formation'=>'Assistante de formation','Formateur'=>'Formateur'),
                'multiple' => false,
            ))
            ->add('Valider', SubmitType::class)
        ;
    }
}