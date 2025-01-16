<?php
namespace App\Form;

use App\Dto\CalculationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Enum\Operation;

/**
 * @extends AbstractType<CalculationRequest>
 */
class CalculationRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('operand1', NumberType::class, [
                'label' => false,
                'required' => true,
            ])
            ->add('operation', ChoiceType::class, [
                'label' => false,
                'choices' => array_combine(
                    array_map(fn (Operation $op) => ucfirst($op->value), Operation::cases()),
                    array_map(fn (Operation $op) => $op->value, Operation::cases())
                ),
                'required' => true,
                'constraints' => new NotBlank(),
            ])
            ->add('operand2', NumberType::class, [
                'label' => false,
                'required' => true,
            ])
            ->add('calculate', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'calculation_request',
            'data_class' => CalculationRequest::class,
        ]);
    }
}
