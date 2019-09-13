<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/addcart/{id}", name="addcart", defaults={"id" = null})
     */
    public function addToCart(Produit $produit, Request $request)
    {
     
        $session = $request->getSession();
        $cart = $session->get('cart');
        if($cart == null){
            $cart = new Cart();
        }

        dump($cart);
        
        $cart->addProduit($produit->getId(), "500");
        $session->set('cart', $cart);
        
        return $this->redirectToRoute("cart");
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function showCart(){

        
        return $this->render('cart/index.html.twig');
    }
}
