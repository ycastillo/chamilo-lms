<?php
/* For licensing terms, see /license.txt */

namespace ChamiloLMS\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Entity;

class SessionPathType extends AbstractType
{
    /**
     * Builds the form
     * For form type details see:
     * http://symfony.com/doc/current/reference/forms/types.html
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('submit', 'submit');

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'ChamiloLMS\Entity\SessionPath'
            )
        );
    }

    public function getName()
    {
        return 'sessionPath';
    }
}

