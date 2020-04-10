<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Purchase;
use App\Form\Admin\PurchaseType;
use App\Repository\Admin\PurchaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/purchase")
 */
class PurchaseController extends AbstractController
{
    /**
     * @Route("/", name="admin_purchase_index", methods={"GET"})
     */
    public function index(PurchaseRepository $purchaseRepository): Response
    {
        return $this->render('admin/purchase/index.html.twig', [
            'purchases' => $purchaseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_purchase_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $purchase = new Purchase();
        $form = $this->createForm(PurchaseType::class, $purchase);
        $form->handleRequest($request);

        $totalCost = 0;

        if ($form->isSubmitted() && $form->isValid()) {
            // total cost calculation
            $stock_in = $purchase->getStockIn();
            $per_unit = $purchase->getUnitCost();
            $totalCost = $stock_in * $per_unit;
            $purchase->setTotalCost($totalCost);
            $purchase->setStatus(1);

            $today = new \DateTime("now");
            $purchase->setCreateAt($today);

            $purchase->setStockLeft($purchase->getStockIn());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($purchase);
            $entityManager->flush();

            $this->addFlash(
                'info',
                'Added successfully'
            );
            return $this->redirectToRoute('admin_purchase_index');
        }

        return $this->render('admin/purchase/new.html.twig', [
            'purchase' => $purchase,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}", name="admin_purchase_show", methods={"GET"})
     */
    public function show(Purchase $purchase): Response
    {
        return $this->render('admin/purchase/show.html.twig', [
            'purchase' => $purchase,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_purchase_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Purchase $purchase): Response
    {
        $form = $this->createForm(PurchaseType::class, $purchase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_purchase_index');
        }

        return $this->render('admin/purchase/edit.html.twig', [
            'purchase' => $purchase,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_purchase_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Purchase $purchase): Response
    {
        if ($this->isCsrfTokenValid('delete'.$purchase->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($purchase);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_purchase_index');
    }
}
