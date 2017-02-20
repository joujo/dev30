<?php
/**
 * Created by PhpStorm.
 * User: 2017
 * Date: 04/02/2017
 * Time: 07:56
 */

namespace Eshop\StockBundle\Controller;

use Eshop\StockBundle\Entity\Produit;
use Eshop\StockBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProduitController extends Controller
{
    public function listprodAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository("EshopStockBundle:Produit")->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $produits, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render("EshopStockBundle:Produit:listprod.html.twig",array(
            'produits'=>$pagination
        ));

    }
    public function ajoutprodAction(Request $request)
    {

        $produit = new Produit();
        $form=$this->createForm(ProduitType::class,$produit);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {

            $em=$this->getDoctrine()->getManager();
            $produit->uploadProfilePicture();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute("eshop_stock_listprod");

        }



        return $this->render("EshopStockBundle:Produit:ajoutprod.html.twig",array(
            'form'=>$form->createView()
        ));

    }
    public function listprodfAction()
    {
        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository("EshopStockBundle:Produit")->findAll();

        return $this->render("EshopStockBundle:Produit:listprodf.html.twig",array(
            'produits'=>$produits
        ));

    }
}