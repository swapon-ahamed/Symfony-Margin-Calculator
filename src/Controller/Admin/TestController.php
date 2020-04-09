<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

// use Symfony\Component\Validator\Constraints as Assert;
// use Symfony\Component\Validator\Mapping\ClassMetadata;

use App\Entity\Products;

class TestController extends AbstractController
{
    /**
     * @Route("/admin/test", name="admin_test")
     */
    public function index( Request $request )
    {   
        $today = new \DateTime("now");
        
        $product = new Products();
        $product->setTitle('Product 2');
        $product->setDescription('Description for product 2');
        $product->setCreateAt($today);


        $entityManage = $this->getDoctrine()->getManager();
        $entityManage->persist($product);
        // $entityManage->remove($product);


        $entityManage->flush();

        



        return $this->render('admin/test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/admin/show", name="admin_show")
     */
    public function show(){

        $entityManage = $this->getDoctrine()->getManager();

        // $products = $entityManage->getRepository(Products::class)->findAll();
        // $products = $entityManage->getRepository(Products::class)->findBy(["id" => 1]);

        $products = $entityManage->getRepository(Products::class)->findOneBy([
            'id' => 1
        ]);

        
        var_dump($products);

        return $this->render('admin/test/show.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/admin/remove", name="admin_removes")
     */
    public function remove(){

        $entityManage = $this->getDoctrine()->getManager();

        // $products = $entityManage->getRepository(Products::class)->findAll();
        // $products = $entityManage->getRepository(Products::class)->findBy(["id" => 1]);

        $product = $entityManage->getRepository(Products::class)->findOneBy([
            'id' => 2
        ]);

        
        // var_dump($product);
        $entityManage->remove($product);
        $entityManage->flush();



        return $this->render('admin/test/show.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
