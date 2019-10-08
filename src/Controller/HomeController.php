<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProduitRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        $pr = $produitRepository->getRandom();
        $produitdesc = $produitRepository->findBy(array(), array('nb_vendu' => 'DESC'));

        
        return $this->render('home/index.html.twig', [
            'produits' => $pr,
            'proddesc' => $produitdesc

        ]);
       
    }
}
