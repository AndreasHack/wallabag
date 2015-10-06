<?php

namespace Wallabag\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('required' => true))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'constraints' => array(
                    new Constraints\Length(array(
                        'min' => 8,
                        'minMessage' => 'Password should by at least 8 chars long',
                    )),
                    new Constraints\NotBlank(),
                ),
            ))
            ->add('email', 'email')
            ->add('save', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wallabag\UserBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'new_user';
    }
}
