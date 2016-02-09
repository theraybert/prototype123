<?php
// src/AppBundle/Controller/ProductController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
	public function createAction()
	{
	    $product = new Product();
	    $product->setName('A Foo Bar');
	    $product->setPrice('19.99');
	    $product->setDescription('Lorem ipsum dolor');

	    $em = $this->getDoctrine()->getManager();

	    $em->persist($product);
	    $em->flush();

	    return new Response('Created product id '.$product->getId());
	}

	public function showAction($id)
	{

		/*
	    $product = $this->getDoctrine()
	        ->getRepository('AppBundle:Product')
	        ->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException(
	            'No product found for id '.$id
	        );
	    }
		*/

		$repository = $this->getDoctrine()->getRepository('AppBundle:Product');

		// query by the primary key (usually "id")
		$product1 = $repository->find($id);

		// dynamic method names to find based on a column value
		$product2 = $repository->findOneById($id);
		$product3 = $repository->findOneByName('A Foo Bar');

		// find *all* products
		$products4 = $repository->findAll();

		// find a group of products based on an arbitrary column value
		$products5 = $repository->findByPrice(19.99);


	    // ... do something, like pass the $product object into a template
	    $showPrd = print_r($product1,1);
		$showPrd .= '<hr>2:'.print_r($product2,1);
		$showPrd .= '<hr>3:'.print_r($product3,1);
		$showPrd .= '<hr>4:'.print_r($products4,1);
		$showPrd .= '<hr>5:'.print_r($products5,1);

	    return new Response('Created product id '.$showPrd);
	}

	public function updateAction($id)
		{
		    $em = $this->getDoctrine()->getManager();
		    $product = $em->getRepository('AppBundle:Product')->find($id);

		    if (!$product) {
		        throw $this->createNotFoundException(
		            'No product found for id '.$id
		        );
		    }

		    $product->setName('New product name!');
		    $em->flush();

		    return $this->redirectToRoute('homepage');
		}
	
	public function deleteAction($id)
		{
		    $em = $this->getDoctrine()->getManager();
		    $product = $em->getRepository('AppBundle:Product')->find($id);

		    if (!$product) {
		        throw $this->createNotFoundException(
		            'No product found for id '.$id
		        );
		    }

			$em->remove($product);
			$em->flush();

		    return $this->redirectToRoute('homepage');
		}
	






}	