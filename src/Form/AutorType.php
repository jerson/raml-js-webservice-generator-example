<?php

namespace Form;

use Entity;
use Form\DataTransformer\EntityToIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AutorType extends AbstractType
{

    /**
     * buildForm Autor
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name','text', array(
                'required' =>true,
            ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'allow_extra_fields' => true,
            'data_class' => 'Entity\Autor',
        ));

    }

    public function getName()
    {
       // return 'autor';
    }

}
