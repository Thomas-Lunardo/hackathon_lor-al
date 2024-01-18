<?php

namespace App\DataFixtures;

use App\Entity\Facepowder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FacepowderFixtures extends Fixture
{
    public const FACEPOWDER = [
        ['name' => '0.5N Porcelaine',
        'poster' => '0-5N-PORCELAINE.jpg',
        'price' => 14,
        ],
        ['name' => '2N Vanille',
        'poster' => '2N-VANILLE.jpg',
        'price' => 19,
        ],
        ['name' => '7.5D Chataigne dorée',
        'poster' => '7-5D-CHATAIGNE-DOREE.jpg',
        'price' => 19,
        ],
        ['name' => '8.5N Noix de pecan',
        'poster' => '8-5N-NOIX-DE-PECAN.jpg',
        'price' => 17,
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::FACEPOWDER as $facepowderFixture) {
            $facepowder = new Facepowder();
            $facepowder->setName($facepowderFixture['name']);
            $facepowder->setPoster($facepowderFixture['poster']);
            $facepowder->setPrice($facepowderFixture['price']);
            $manager->persist($facepowder);
        }
        $manager->flush();
    }
}
