<?php

namespace TheWellCom\ContactBundle\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class ContactType extends AbstractType
{
    protected $entityClass;

    public function __construct($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('phone')
            ->add('subject')
            ->add('email')
            ->add('message')
            ->add('save', SubmitType::class, array('label' => 'contact.send'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->entityClass,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contact_form';
    }
}
