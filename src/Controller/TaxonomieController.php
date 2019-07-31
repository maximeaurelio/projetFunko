<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaxonomieController extends AbstractController
{
    /**
     * @Route("/taxonomie", name="taxonomie")
     */
    public function index()
    {
        return $this->render('taxonomie/index.html.twig', [
            'controller_name' => 'TaxonomieController',
        ]);
    }
}
