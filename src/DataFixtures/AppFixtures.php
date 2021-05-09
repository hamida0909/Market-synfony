<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use Faker;
class AppFixtures extends Fixture
{
    
    
        public function load(ObjectManager $manager)
        {
            $generator = Faker\Factory::create();
            for ($i = 0; $i < 20; $i++) {
                $product = new Produit();
                $product->setTitle($generator->text(50));
                $product->setContent($generator->text(6000));
                $product->setPicture($generator->pictureUrl());
                $product->setPrice(mt_rand(10, 100));
                $product->setCp(mt_rand(10, 100));
                $product->setCity($generator->text());
                
               $manager->persist($product);
            }
            $manager->flush();
       }
    
}
