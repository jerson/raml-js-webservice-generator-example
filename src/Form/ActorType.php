<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActorType extends AbstractType
{

    /**
     * buildForm Actor
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name','text', array(
                'required' =>true,
            ));
        $builder->add('slug','text', array(
                'required' =>true,
            ));
        $builder->add('country','text', array(
                'required' =>false,
            ));
        $builder->add('birthday', 'date', array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'required' =>false,
            ));
        $builder->add('biography','text', array(
                'required' =>false,
            ));
        $builder->add('image','text', array(
                'required' =>true,
            ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'allow_extra_fields' => true,
            'data_class' => 'Entity\Actor',
        ));

    }

    public function getName()
    {
       // return 'actor';
    }

}
