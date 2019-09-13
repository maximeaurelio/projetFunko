<?php

namespace App\Entity;

class Cart
{
    private $dateCreation;
    private $totalPrice;
    private $produits = [];

    public function __construct(){
        $this->dateCreation = new \DateTime();
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function getProduits(): ?array
    {
        return $this->produits;
    }

    public function addProduit($pid, $price){

        if(array_key_exists($pid, $this->produits)){
            $this->produits[$pid]++;
        }
        else{
            $this->produits[$pid] = 1;
        }
        $this->totalPrice+= $price;

    }
}
