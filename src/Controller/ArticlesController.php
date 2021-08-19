<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ArticlesController
 * @package App\Controller
 * @Route("/actualites", name="actualites_")
 */

class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function index(): Response
    {
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        dd($produits);
        return $this->render('articles/index.html.twig', [
            'articles' => $produits,
        ]);
    }
    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter()
    {
        $produit=new Produit();
        $produit->setTitle('airpods');
        $produit->setQuantite(1);
        $produit->setPrix(400);
        $produit->setDescription('Accompagné de son boîtier de chargement/rangement, l’Apple AirPods est un casque Bluetooth composé de deux oreillettes indépendantes');
        $produit->setImage('https://media.ldlc.com/r1600/ld/products/00/05/50/35/LD0005503574_2.jpg');


        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);

        $em->flush();
        return $this->render('articles/ajouter.html.twig', array('id1' => $produit->getId()));
        
    }
    
}
