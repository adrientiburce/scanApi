<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Item;
use Bezhanov\Faker\Provider\Medicine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//
//        $faker = Factory::create('fr_FR');
//        $faker->addProvider(new Medicine($faker));
//
//        // Category Medicine
//        $category = new Category();
//        $category->setTitle("Pharmacie")
//            ->setAbscisse(mt_rand(1, 10))
//            ->setOrdonnee(mt_rand(1, 10));
//
//        for ($i = 0; $i < mt_rand(3, 10); $i++) {
//            $item = new Item();
//            $item->setTitle($faker->medicine)
//                ->setCategory($category)
//                ->setPrice(mt_rand(5, 50))
//                ->setWeight(mt_rand(1, 30));
//            $manager->persist($item);
//        }
//        $manager->persist($category);
//
//        $manager->flush();
    }
}
