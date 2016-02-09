<?php
// src/AppBundle/Controller/TestController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TestController extends Controller
{

    public function indexAction(Request $request)
    {
        return new Response(
            "<html><body>Test::index !</body></html>"
        );
    }

    public function bootstrapAction(Request $request)
    {


        $form = $this->createFormBuilder()
                     ->add('task', TextType::class)
                     ->add('dueDate', DateType::class)                     
                     ->getForm();
     
        return $this->render('test/form_help.html.twig', array(
            'form' => $form->createView(),
        ));

        
        /*
        return new Response(
            "<html><body>Test::boostrap !</body></html>"
        );
        */
    }


}