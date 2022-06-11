<?php
/**
 * Category fixtures
 */
namespace App\DataFixtures;

use App\Entity\Category;
/**
 * Class CategoryFixtures.
 */
class CategoryFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {

        for ($i = 0; $i < 10; ++$i) {
            $category = new Category();
            $category->setCategoryName($this->faker->unique()->word);

            $this->manager->persist($category);
        }


        $this->manager->flush();
    }


}
