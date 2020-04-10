<?php

namespace App\Controller\Admin;

use App\Repository\Admin\SalesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Admin\Sales;

/**
 * @Route("/")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="admin_index",methods={"GET"})
     */

    public function index(SalesRepository $salesRepository): Response
    {
    	$sales = $salesRepository->findAll();
    	$totalProfit = 0;

    	foreach ($sales as $sale) {
    		$totalProfit += $sale->getProfit();
    	}
        return $this->render('admin/index/index.html.twig', [
            'totalProfit' => $totalProfit,
        ]);
    }
}
