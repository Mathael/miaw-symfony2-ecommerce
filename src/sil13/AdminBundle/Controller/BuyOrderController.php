<?php

namespace sil13\AdminBundle\Controller;

use sil13\VitrineBundle\Entity\BuyOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Buyorder controller.
 *
 */
class BuyOrderController extends Controller
{
    /**
     * Lists all buyOrder entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $buyOrders = $em->getRepository('sil13VitrineBundle:BuyOrder')->findAll();

        return $this->render('sil13AdminBundle:buyorder:index.html.twig', array(
            'buyOrders' => $buyOrders,
        ));
    }

    /**
     * Creates a new buyOrder entity.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        $buyOrder = new Buyorder();
        $form = $this->createForm('sil13\AdminBundle\Form\BuyOrderType', $buyOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($buyOrder);
            $em->flush();

            return $this->redirectToRoute('admin_buyorder_show', array('id' => $buyOrder->getId()));
        }

        return $this->render('sil13AdminBundle:buyorder:new.html.twig', array(
            'buyOrder' => $buyOrder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a buyOrder entity.
     * @param BuyOrder $buyOrder
     * @return Response
     */
    public function showAction(BuyOrder $buyOrder)
    {
        $deleteForm = $this->createDeleteForm($buyOrder);

        return $this->render('sil13AdminBundle:buyorder:show.html.twig', array(
            'buyOrder' => $buyOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing buyOrder entity.
     * @param Request $request
     * @param BuyOrder $buyOrder
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, BuyOrder $buyOrder)
    {
        $deleteForm = $this->createDeleteForm($buyOrder);
        $editForm = $this->createForm('sil13\AdminBundle\Form\BuyOrderType', $buyOrder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_buyorder_edit', array('id' => $buyOrder->getId()));
        }

        return $this->render('sil13AdminBundle:buyorder:edit.html.twig', array(
            'buyOrder' => $buyOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a buyOrder entity.
     * @param Request $request
     * @param BuyOrder $buyOrder
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, BuyOrder $buyOrder)
    {
        $form = $this->createDeleteForm($buyOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($buyOrder);
            $em->flush();
        }

        return $this->redirectToRoute('admin_buyorder_index');
    }

    /**
     * Creates a form to delete a buyOrder entity.
     *
     * @param BuyOrder $buyOrder The buyOrder entity
     *
     * @return Form The form
     */
    private function createDeleteForm(BuyOrder $buyOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_buyorder_delete', array('id' => $buyOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
