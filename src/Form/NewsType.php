<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{

    /**
     * buildForm News
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('autor', 'entity', array(
                'class' => 'Entity\Autor',
                //'property' => 'id',
                'required' =>false,
            ));
        $builder->add('title','text', array(
                'required' =>true,
            ));
        $builder->add('content','text', array(
                'required' =>true,
            ));
        $builder->add('slug','text', array(
                'required' =>true,
            ));
        $builder->add('views','text', array(
                'required' =>false,
            ));
        $builder->add('date', 'date', array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd H:mm',
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
            'data_class' => 'Entity\News',
        ));

    }

    public function getName()
    {
       // return 'news';
    }

}
