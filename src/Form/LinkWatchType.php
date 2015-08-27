<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkWatchType extends AbstractType
{

    /**
     * buildForm LinkWatch
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('link','text', array(
                'required' =>false,
            ));
        $builder->add('provider','text', array(
                'required' =>false,
            ));
        $builder->add('language','text', array(
                'required' =>false,
            ));
        $builder->add('format','text', array(
                'required' =>false,
            ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'allow_extra_fields' => true,
            'data_class' => 'Entity\LinkWatch',
        ));

    }

    public function getName()
    {
       // return 'link_watch';
    }

}
