<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elastica\Query\QueryString;
use Elastica\Filter\Query;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        $finder = $this->container->get('fos_elastica.finder.user');
        
        $results = $finder->find('wwww');
        
        
        // find articles with "like" query
        $keywordQuery = new QueryString();
        $keywordQuery->setQuery("*t*");

        $query = new Query();   
        $query->setQuery($keywordQuery);

        $articles = $finder->find($query);
        
        dump($articles);
        
       // dump($results);
        exit;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
