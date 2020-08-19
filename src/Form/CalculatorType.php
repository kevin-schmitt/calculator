<?php

namespace App\Form;

use App\Model\CalculatorDTO;
use App\Utils\Operations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CalculatorType extends AbstractType
{
    use Operations;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('operator', ChoiceType::class, [
            'choices' => $this->getOperations(),
            'required' => true,
        ])
        ->add('firstValue', IntegerType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Need a value for calcul',
                ]),
            ],
            'required' => true,
        ])
        ->add('secundValue', IntegerType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Need a value for calcul',
                ]),
            ],
            'required' => true,
        ])
        ->add('calculate', SubmitType::class, ['label' => 'Calcul'])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CalculatorDTO::class,
        ]);
    }
}
