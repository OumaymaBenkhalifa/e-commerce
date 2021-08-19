<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommerceController extends AbstractController
{
    /**
     * @Route("/", name="commerce")
     */
    public function index(): Response
    {
        return $this->render('commerce/index.html.twig');
    }
    /**
     * @Route("/afficher", name="produits")
     */
    public function afficher(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();
        return $this->render('commerce/afficher.html.twig',['articles' => $produits,]);
    }
}
