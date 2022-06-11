<?php
/**
 * Category fixtures
 */
namespace App\DataFixtures;

use App\Entity\Note;
use DateTimeImmutable;

class NoteFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {

        for ($i = 0; $i < 10; ++$i) {
            $note = new Note();
            $note->setNoteTitle($this->faker->unique()->word);
            $note->setNoteContent($this->faker->sentence);
            $note->setCreateTime(
                DateTimeImmutable::createFromMutable(
                    $this->faker->dateTimeBetween('-100 days', '-1 days')
                )
            );
            $this->manager->persist($note);
        }


        $this->manager->flush();
    }


}
