<?php

// src/AppBundle/Controller/TaskingController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//use Symfony\Component\Form\Extension\Core\Type\IntegerType;
//use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskingController extends Controller
{
    
    public function showAction(Request $request)
    {        
        
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        //$task->setLevel(new \Integer(0));
        //$task->setLevel('0');

        /* Instead of building the form in the controller we using class TaskType (AppBundle\Form\Type\TaskType)
        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)            
            ->add('dueDate', DateType::class)            
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add'))
            ->getForm();
        $form->handleRequest($request);
        */

        // This way I may use the form task any where whitout need to repeat-it
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database
            // ....
            //$form->get('sbmDate')->setData(new \DateTime());
            echo '<pre>';
            print_r($task);
            die;
            #return $this->redirectToRoute('task_success');


            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? 'task_new'
                : 'task_success';

            return $this->redirectToRoute($nextAction);


        }            

        return $this->render('default/tasking.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function successAction()
    {        

        return new Response(
            "<html><body>Wonderfull success tasked !</body></html>"
        );

    }

}