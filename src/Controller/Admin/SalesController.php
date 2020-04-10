<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Sales;
use App\Form\Admin\SalesType;
use App\Repository\Admin\SalesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Admin\Product;
use App\Entity\Admin\Purchase;

use App\Repository\Admin\ProductRepository;

/**
 * @Route("/admin/sales")
 */
class SalesController extends AbstractController
{
    /**
     * @Route("/", name="admin_sales_index", methods={"GET"})
     */
    public function index(SalesRepository $salesRepository): Response
    {
        return $this->render('admin/sales/index.html.twig', [
            'sales' => $salesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_sales_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sale = new Sales();
        $form = $this->createForm(SalesType::class, $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $product_id      = $request->request->get('sales')['product'];
            $sale_unit_price = $sale->getUnitPrice();
            $sale_quantity   = $sale->getQuantity();

            $entityManager   = $this->getDoctrine()->getManager();
            $purchases        = $entityManager->getRepository(Purchase::class)->findBy(
                                    ['product' => $product_id , 'status' => 1],
                                    ['id' => 'ASC']
                                );
            $profit = 0;
            $total  = 0;
            if(count($purchases) > 0 ){

                foreach ($purchases as $purchase) {
                   $purchase_unit_cost  = $purchase->getUnitCost();
                   $purchase_stock_left = $purchase->getStockLeft();
                   if( $sale_quantity >= $purchase_stock_left && count($purchases) > 1 ){

                        $profit     = Sales::calculateProfit(
                            $sale_unit_price,
                            $purchase_stock_left,
                            $purchase_unit_cost
                        );


                        $total = $sale_unit_price * $purchase_stock_left;

                        $sale->setTotalPrice($total);
                        $sale->setProfit($profit);
                        $purchase->setStatus(0);
                        $purchase->setStockLeft(0);

                        $entityManager->persist($sale);
                        $entityManager->persist($purchase);

                        $sale_quantity = $sale_quantity - $purchase_stock_left;
                   }else if($purchase_stock_left > 0 && $sale_quantity <= $purchase_stock_left ){

                    $rest_of_stock       = $purchase_stock_left - $sale_quantity;
                    $purchase->setStockLeft($rest_of_stock);

                    if($rest_of_stock  == 0){
                        $purchase->setStatus(0);
                    }

                    $profit     += Sales::calculateProfit(
                            $sale_unit_price,
                            $sale_quantity,
                            $purchase_unit_cost
                        );
                    $total += $sale_unit_price * $sale_quantity;
                    $sale->setProfit($profit);
                    $sale->setTotalPrice($total);
                    $entityManager->persist($sale);
                    $entityManager->persist($purchase);

                    $this->addFlash(
                        'info',
                        'Sale added successfully'
                    );

                }else{

                       $this->addFlash(
                           'fail',
                           'Out of stock!'
                       ); 
                    }
                }
            }else{
               $this->addFlash(
                   'fail',
                   'Out of stock!'
               );  
            }

            $entityManager->flush();
            return $this->redirectToRoute('admin_sales_index');
        }

        return $this->render('admin/sales/new.html.twig', [
            'sale' => $sale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_sales_show", methods={"GET"})
     */
    public function show(Sales $sale): Response
    {
        return $this->render('admin/sales/show.html.twig', [
            'sale' => $sale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_sales_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sales $sale): Response
    {
        $form = $this->createForm(SalesType::class, $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_sales_index');
        }

        return $this->render('admin/sales/edit.html.twig', [
            'sale' => $sale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_sales_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sales $sale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_sales_index');
    }
}
