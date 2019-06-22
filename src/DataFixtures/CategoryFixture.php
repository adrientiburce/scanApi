<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public const ALL_CATEGORY = [
        'Poisson',
        'Boulangerie',
        'Gateaux',
        'Chips',
        'Bière',
        'Vins',
        'Sodas',
        'Jus de fuits',
        'Viandes',
        'Légumes',
        'Shampoing',
        'Dentaire',
        'Produits ménager',
        'Serviettes',
        'Caisse',
    ];

    public const ALL_POSITION = [
        [7, 3],
        [7, 6],
        [6, 6],
        [5, 6],
        [6, 3],
        [5, 3],
        [6, 0],
        [5, 0],
        [3, 6],
        [2, 6],
        [3, 3],
        [2, 3],
        [3, 0],
        [2, 0],
        [0, 0],
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < sizeof(self::ALL_CATEGORY); $i++) {
            $category = new Category();
            $category->setTitle(self::ALL_CATEGORY[$i])
                ->setAbscisse(self::ALL_POSITION[$i][0])
                ->setOrdonnee(self::ALL_POSITION[$i][1]);

            $manager->persist($category);
            $manager->flush();
            // other fixtures can get this object using the CategoryFixtures::ALL_CATEGORY
            $this->addReference(self::ALL_CATEGORY[$i], $category);
        }
    }
}
