<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class Message1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sender', TextType::class, [
                'label' => 'Neved',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ide írd a neved',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Hiba! Kérjük töltsd ki az összes mezőt!']),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail címed',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ide írd az e-mail címed',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Hiba! Kérjük töltsd ki az összes mezőt!']),
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Üzenet szövege',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ide írd az üzenetet',
                    'rows' => 4,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Hiba! Kérjük töltsd ki az összes mezőt!']),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
