<?php 
// src/AppBundle/Form/Type/TaskType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\Form\Extension\Core\Type\DateType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	//->setMethod('GET')
            ->add('task')
            //->add('dueDate', DateType::class, array('widget' => 'single_text'))
            ->add('dueDate', null, array('widget' => 'single_text'))
            ->add('sbmDate', null, array('mapped' => false))
            ->add('save', SubmitType::class)
            ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add'))
            //->add('queue', ChoiceType::class, array('choices' => array('a' => 'Admin', 'b' => 'Techno', 'c' => 'Service')))
            //->add('level', IntegerType::class)
        ;
    }
}