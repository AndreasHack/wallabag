<?php

namespace Wallabag\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('save', 'submit')
            ->remove('username')
            ->remove('plainPassword')
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wallabag\UserBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'update_user';
    }
}
