<?php

namespace App\Controller;

use App\Entity\Produit;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    
    public function searchBar(){
        $form = $this->createFormBuilder(null)
            ->setAction($this->generateUrl('forum_search'))
            ->setMethod("POST")
            ->add('query', TextType::class, [
                'label' => false, 
                'attr' => [
                    'type' => "search",
                    'placeholder' => "Rechercher une figurine...",
                    'aria-label'=> "Search",
                    'minlength' => 3
                ]
            ])
            ->add('Rechercher', SubmitType::class)
            ->getForm();

        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/forum_search", name="forum_search")
     */
     public function searchResults(Request $request): Response
     {
         $query = $request->request->get('form')['query'];
         
         $results = $this->getDoctrine()->getRepository(Produit::class)->searchProduits($query);

         return $this->render('search/searchResult.html.twig', [
             'produits' => $results
         ]);
     }
}