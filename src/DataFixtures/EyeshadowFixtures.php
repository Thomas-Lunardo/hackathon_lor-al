<?php

namespace App\DataFixtures;

use App\Entity\Eyeshadow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

;

class EyeshadowFixtures extends Fixture
{
    public const EYESHADOW = [
            ['name' => 'MID-QUEEN',
            'poster' => 'MID-QUEEN.jpg',
            'price' => 14,
            ],
            ['name' => 'PARADISE-SHOCK',
            'poster' => 'PARADISE-SHOCK.jpg',
            'price' => 19,
            ],
            ['name' => 'VINTAGE-JEAN-BABY',
            'poster' => 'VINTAGE-JEAN-BABY.jpg',
            'price' => '19',
            ],
            ['name' => 'WARM-NEUTRALS',
            'poster' => 'WARM-NEUTRALS.jpg',
            'price' => 17,
            ]
        ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::EYESHADOW as $eyeshadowFixture) {
            $eyeshadow = new Eyeshadow();
            $eyeshadow->setName($eyeshadowFixture['name']);
            $eyeshadow->setPoster($eyeshadowFixture['poster']);
            $eyeshadow->setPrice($eyeshadowFixture['price']);
            $manager->persist($eyeshadow);
        }
        $manager->flush();
    }
}
