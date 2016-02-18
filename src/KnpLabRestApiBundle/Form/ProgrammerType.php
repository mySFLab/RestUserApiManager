<?php

namespace KnpLabRestApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgrammerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickname')
            ->add('avatarNumber', 'choice', [
                'choices' => [
                    "1" => "Girl",
                    "2" => "Boy",
                    "3" => "Boy with Cat",
                    "4" => "Cat",
                    "5" => "Girl purple",
                    "6" => "Robot",
                ]
            ])
            ->add('tagLine')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KnpLabRestApiBundle\Entity\Programmer'
        ));
    }
}
