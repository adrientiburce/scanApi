<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ItemFixture extends Fixture
{
    public const ALL_ITEMS = array(
        ['Saumon', 'Macreau', 'Sushi', 'Hareng'],
        ['Baguette', 'Pain tranché', 'Cracotte'],
        ['Twix', 'Mars', 'Oréo'],
        ['Curly', 'Biscuits apéro'],
        ['Heineken', 'Goudale', 'Leffe', 'Donker'],
        ['Vin Rouge', 'Vin Blanc', 'Rosé'],
        ['Oasis', 'Coca-cola', 'Orangina'],
        ['Jus de Pomme', "Jus d'orange", 'Jus de raisin'],
        ['Bifteak', 'Echine', 'Foie de veau'],
        ['Carotte', 'Choux', 'Haricots verts'],
        ['Head & Shoulder', "L'oréal", "Ushuai"],
        ['Brosse à dents', 'Fil dentaire', 'Dentifrice'],
        ['Canard WC', 'Détartrant', 'Lave vaisselle'],
        ['PQ', 'Sopalin'],
        [],
    );

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < sizeof(CategoryFixture::ALL_CATEGORY); $i++) {

            for ($j = 0; $j < sizeof(self::ALL_ITEMS[$i]); $j++) {
                $item = new Item();
                $item->setTitle(self::ALL_ITEMS[$i][$j])// jème element du ième table de ALL_ITEMS
                    ->setCategory($this->getReference(CategoryFixture::ALL_CATEGORY[$i]))
                    ->setPrice(mt_rand(1, 20))
                    ->setWeight(mt_rand(1, 30))
                    ->setFragility(mt_rand(0, 5));
                $manager->persist($item);
            }
            $manager->flush();
        }
    }


    // ensure we create CategoryFixture before
    public function getDependencies()
    {
        return array(
            CategoryFixture::class,
        );
    }

}
