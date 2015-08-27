<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenreType extends AbstractType
{

    /**
     * buildForm Genre
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name','text', array(
                'required' =>true,
            ));
        $builder->add('slug','text', array(
                'required' =>true,
            ));
        $builder->add('total','text', array(
                'required' =>false,
            ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'allow_extra_fields' => true,
            'data_class' => 'Entity\Genre',
        ));

    }

    public function getName()
    {
       // return 'genre';
    }

}
