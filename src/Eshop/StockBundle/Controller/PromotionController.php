<?php
/**
 * Created by PhpStorm.
 * User: 2017
 * Date: 15/02/2017
 * Time: 15:55
 */

namespace Eshop\StockBundle\Controller;

use Eshop\StockBundle\Form\PromotionType;
use Symfony\Component\HttpFoundation\Request;


use Eshop\StockBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PromotionController extends Controller
{
    public function listpromAction()
    {
        $em=$this->getDoctrine()->getManager();
            $promotions=$em->getRepository("EshopStockBundle:Promotion")->findAll();

        return $this->render("EshopStockBundle:Promotion:listprom.html.twig",array(
            'promotions'=>$promotions
        ));

    }
    public function deletepromAction(Request $request , $id)
    {
        $promotion = new Promotion();

        $em = $this->getDoctrine()->getManager();
        $promotion=$em->getRepository("EshopStockBundle:Promotion")->find($id);

        $em->remove($promotion);
        $em->flush();

        return $this->redirectToRoute("eshop_stock_listprom");
    }
    public function ajoutpromAction(Request $request)
    {

        $promotion = new Promotion();
        $form=$this->createForm(PromotionType::class,$promotion);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {

            $em=$this->getDoctrine()->getManager();
            if( $promotion->getDateDebut()<$promotion->getDateFin() )
            $em->persist($promotion);
            $em->flush();
            return $this->redirectToRoute("eshop_stock_listprom");

        }



        return $this->render("EshopStockBundle:Promotion:ajoutprom.html.twig",array(
            'form'=>$form->createView()
        ));

    }
    public function updatepromAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();

        $promotion=$em->getRepository("EshopStockBundle:Promotion")->find($id);

        $form= $this->createForm(PromotionType::class,$promotion);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {



            $em->persist($promotion);
            $em->flush();
            return $this->redirectToRoute("eshop_stock_listprom");
        }
        return $this->render("EshopStockBundle:Promotion:updateprom.html.twig",array(
            'form'=>$form->createView()
        ));

    }
}