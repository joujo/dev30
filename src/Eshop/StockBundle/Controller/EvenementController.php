<?php
/**
 * Created by PhpStorm.
 * User: 2017
 * Date: 11/02/2017
 * Time: 07:33
 */

namespace Eshop\StockBundle\Controller;


use Eshop\StockBundle\Entity\Evenement;
use Eshop\StockBundle\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends Controller
{
    public function ajoutEveAction(Request $request)
    {

        $evenement = new Evenement();
        $form=$this->createForm(EvenementType::class,$evenement);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {

            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
           return $this->redirectToRoute("eshop_stock_listEve");

        }



        return $this->render("EshopStockBundle:Evenement:ajoutEve.html.twig",array(
            'form'=>$form->createView()
        ));

    }
    public function listEveAction()
    {
        $em=$this->getDoctrine()->getManager();
        $evenements=$em->getRepository("EshopStockBundle:Evenement")->findAll();

        return $this->render("EshopStockBundle:Evenement:listEve.html.twig",array(
            'evenements'=>$evenements
        ));

    }
    public function deleteEveAction(Request $request , $id)
    {
        $evenement = new Evenement();

        $em = $this->getDoctrine()->getManager();
        $evenement=$em->getRepository("EshopStockBundle:Evenement")->find($id);

        $em->remove($evenement);
        $em->flush();

        return $this->redirectToRoute("eshop_stock_listEve");
    }
    public function updateEveAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();

        $evenement=$em->getRepository("EshopStockBundle:Evenement")->find($id);

        $form= $this->createForm(EvenementType::class,$evenement);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {



            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute("eshop_stock_listEve");
        }
        return $this->render("EshopStockBundle:Evenement:updateEve.html.twig",array(
            'form'=>$form->createView()
        ));

    }
}