<?php
/**
 * Created by PhpStorm.
 * User: 2017
 * Date: 05/02/2017
 * Time: 23:20
 */

namespace Eshop\StockBundle\Controller;


use Eshop\StockBundle\Entity\Reclamation;
use Eshop\StockBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{
    function  ajoutAction(Request $request)
    {
        $reclamation=new Reclamation();

        $form=$this->createForm(ReclamationType::class,$reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            //return $
        }

        return $this->render("EshopStockBundle:Reclamation:ajout.html.twig",array(
            'form'=>$form->createView()
        ));


    }
}