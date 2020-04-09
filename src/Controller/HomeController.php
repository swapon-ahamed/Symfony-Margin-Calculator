<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/home", name="home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/hello/{name}", name="hello")
     */

    public function hello(Request $request, $name){
        $name = $request->get('name');
        return $this->render('home/hello.html.twig',[
            'name' => $name
        ]);
    }
}
