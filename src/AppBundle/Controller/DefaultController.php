<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {       

        $topNews = array(
            array(
                'title'=>"Jean-Paul L'Allier:",
                'slug'=>"Décès de Jean-Paul L'Allier, ancien maire de Québec",
                'photo'=>'/photos/photo1.jpg',
                'url'=> "fr.canoe.ca"
            ),
            array(
                'title'=>"Rogue One:",
                'slug'=>"Rogue One: A Star Wars Story, le plus attendu de 2016",
                'photo'=>'/photos/photo2.jpg',
                'url'=> "fr.canoe.ca"
            ),            
            array(
                'title'=>"Eugenie Bouchard:",
                'slug'=>"Premier match et première victoire pour Genie",
                'photo'=>'/photos/photo3.jpg',
                'url'=> "fr.canoe.ca"
            ),
            array(
                'title'=>"Paris:",
                'slug'=>"Paris: le canal Saint-Martin se refait une beauté",
                'photo'=>'/photos/photo4.jpg',
                'url'=> "fr.canoe.ca"
            ),
            array(
                'title'=>"Les Sénateurs d'Ottawa",
                'slug'=>"Les Sénateurs rebondissent",
                'photo'=>'/photos/photo5.jpg',
                'url'=> "fr.canoe.ca"
            ),
            array(
                'title'=>"Chalets",
                'slug'=>"Fortes hausses de loyers pour les propriétaires de chalets",
                'photo'=>'/photos/photo6.jpg',
                'url'=> "fr.canoe.ca"
            )
        );
        
        $slug = $this->get('app.slugger')->slugify('un chien est noir ou rouge.');

        echo $slug;

        $weather = $this->get('app.meteo')->getWeather('Montréal');
        echo $weather;
        
        return $this->render('main/index.html.twig', array(
            'topNews' => $topNews,
        ));

        //return $this->render('main/index.html.twig', [
        //    'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        //]);

    }
}