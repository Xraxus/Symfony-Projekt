<?php
/**
 * Note fixtures
 */
namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Note;
use DateTimeImmutable;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NoteFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     */
    public function loadData(): void
    {
        if (null === $this->manager || null === $this->faker) {
            return;
        }

        $this->createMany(50, 'notes', function (int $i) {
            $note = new Note();
            $note->setNoteTitle($this->faker->unique()->word);
            $note->setNoteContent($this->faker->sentence);
            $note->setCreateTime(
                DateTimeImmutable::createFromMutable(
                    $this->faker->dateTimeBetween('-100 days', '-1 days')
                )
            );
            /** @var Category $category */
            $category = $this->getRandomReference('categories');
            $note->setCategory($category);
            return $note;
        });


        $this->manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return string[] of dependencies
     *
     * @psalm-return array{0: CategoryFixtures::class}
     */
    public function getDependencies(): array
    {
        return [CategoryFixtures::class];
    }
}
