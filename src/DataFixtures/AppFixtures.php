<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use phpDocumentor\Reflection\Types\This;

class AppFixtures extends Fixture
{
	/** @var Generator */
	protected $faker;

	public function load(ObjectManager $manager)
	{

		$this->faker = Factory::create();

		for ($i = 0; $i < 20; $i++) {
			$product = new Product();
			$product->setName($this->faker->firstName);
			$product->setDescription($this->faker->text(100));
			$product->setPrice($this->faker->randomFloat(2, 50, 1000));
			$manager->persist($product);
		}


		$manager->flush();
	}
}
