<?php

namespace App\DataFixtures;

use App\Entity\Highlighter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HighlighterFixtures extends Fixture
{
    public const HIGHLIHTER = [
        [
            'name' => 'Machinist chaud',
            'poster' => 'MACHINIST-CHAUD.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Machinist froid',
            'poster' => 'MACHINIST-FROID.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Machinist neutre',
            'poster' => 'MACHINIST-NEUTRE.jpg',
            'price' => 12,
        ],
        [
            'name' => 'Light from paradise',
            'poster' => 'LIGHT-FROM-PARADISE.jpg',
            'price' => 14,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::HIGHLIHTER as $highlighterFixture) {
            $highlighter = new Highlighter();
            $highlighter->setName($highlighterFixture['name']);
            $highlighter->setPoster($highlighterFixture['poster']);
            $highlighter->setPrice($highlighterFixture['price']);
            $manager->persist($highlighter);
        }
        $manager->flush();
    }
}
