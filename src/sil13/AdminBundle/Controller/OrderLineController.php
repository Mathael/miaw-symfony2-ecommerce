<?php

namespace sil13\AdminBundle\Controller;

use sil13\VitrineBundle\Entity\OrderLine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Orderline controller.
 *
 */
class OrderLineController extends Controller
{
    /**
     * Lists all orderLine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orderLines = $em->getRepository('sil13VitrineBundle:OrderLine')->findAll();

        return $this->render('sil13AdminBundle:orderline:index.html.twig', array(
            'orderLines' => $orderLines,
        ));
    }

    /**
     * Creates a new orderLine entity.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        $orderLine = new Orderline();
        $form = $this->createForm('sil13\AdminBundle\Form\OrderLineType', $orderLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orderLine);
            $em->flush();

            return $this->redirectToRoute('admin_orderline_show', array('id' => $orderLine->getId()));
        }

        return $this->render('sil13AdminBundle:orderline:new.html.twig', array(
            'orderLine' => $orderLine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a orderLine entity.
     * @param OrderLine $orderLine
     * @return Response
     */
    public function showAction(OrderLine $orderLine)
    {
        $deleteForm = $this->createDeleteForm($orderLine);

        return $this->render('sil13AdminBundle:orderline:show.html.twig', array(
            'orderLine' => $orderLine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing orderLine entity.
     * @param Request $request
     * @param OrderLine $orderLine
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, OrderLine $orderLine)
    {
        $deleteForm = $this->createDeleteForm($orderLine);
        $editForm = $this->createForm('sil13\AdminBundle\Form\OrderLineType', $orderLine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_orderline_edit', array('id' => $orderLine->getId()));
        }

        return $this->render('sil13AdminBundle:orderline:edit.html.twig', array(
            'orderLine' => $orderLine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a orderLine entity.
     * @param Request $request
     * @param OrderLine $orderLine
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, OrderLine $orderLine)
    {
        $form = $this->createDeleteForm($orderLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($orderLine);
            $em->flush();
        }

        return $this->redirectToRoute('admin_orderline_index');
    }

    /**
     * Creates a form to delete a orderLine entity.
     *
     * @param OrderLine $orderLine The orderLine entity
     *
     * @return Form The form
     */
    private function createDeleteForm(OrderLine $orderLine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_orderline_delete', array('id' => $orderLine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
