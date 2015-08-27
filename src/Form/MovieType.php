<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieType extends AbstractType
{

    /**
     * buildForm Movie
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name','text', array(
                'required' =>true,
            ));
        $builder->add('slug','text', array(
                'required' =>true,
            ));
        $builder->add('autor', 'entity', array(
                'class' => 'Entity\Autor',
                //'property' => 'id',
                'required' =>false,
            ));
        $builder->add('date_released', 'date', array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'required' =>false,
            ));
        $builder->add('year','text', array(
                'required' =>false,
            ));
        $builder->add('trailer','text', array(
                'required' =>true,
            ));
        $builder->add('sinopsis','text', array(
                'required' =>true,
            ));
        $builder->add('musicians','text', array(
                'required' =>false,
            ));
        $builder->add('screenwriters','text', array(
                'required' =>false,
            ));
        $builder->add('directors','text', array(
                'required' =>false,
            ));
        $builder->add('producers','text', array(
                'required' =>false,
            ));
        $builder->add('actors', 'entity', array(
                'class' => 'Entity\Actor',
                //'property' => 'id',
                'multiple' => true,
                'required' =>true,
            ));
        $builder->add('genres', 'entity', array(
                'class' => 'Entity\Genre',
                //'property' => 'id',
                'multiple' => true,
                'required' =>true,
            ));
        $builder->add('links_watch', 'entity', array(
                'class' => 'Entity\LinkWatch',
                //'property' => 'id',
                'multiple' => true,
                'required' =>false,
            ));
        $builder->add('links_download', 'entity', array(
                'class' => 'Entity\LinkDownload',
                //'property' => 'id',
                'multiple' => true,
                'required' =>true,
            ));
        $builder->add('views','text', array(
                'required' =>false,
            ));
        $builder->add('rating','text', array(
                'required' =>false,
            ));
        $builder->add('next_release','text', array(
                'required' =>false,
            ));
        $builder->add('image','text', array(
                'required' =>false,
            ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'allow_extra_fields' => true,
            'data_class' => 'Entity\Movie',
        ));

    }

    public function getName()
    {
       // return 'movie';
    }

}
