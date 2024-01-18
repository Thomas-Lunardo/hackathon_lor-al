<?php

namespace App\DataFixtures;

use App\Entity\Lipstick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LipstickFixtures extends Fixture
{
    public const LIPSTICK = [
        [
            'name' => 'Iconique',
            'poster' => '27-ICONIQUE.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Organza',
            'poster' => '236-ORGANZA.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Worth it',
            'poster' => '601-WORTH-IT.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Beige à nu',
            'poster' => '630-BEIGE-A-NU.jpg',
            'price' => 12,
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::LIPSTICK as $lipstickFixture) {
            $lipstick = new Lipstick();
            $lipstick->setName($lipstickFixture['name']);
            $lipstick->setPoster($lipstickFixture['poster']);
            $lipstick->setPrice($lipstickFixture['price']);
            $manager->persist($lipstick);

            $manager->flush();
        }
    }
}
