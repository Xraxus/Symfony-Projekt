<?php

/**
 * Task fixtures
 */
namespace App\DataFixtures;

use App\Entity\Task;
use DateTimeImmutable;

class TaskFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {

        for ($i = 0; $i < 10; ++$i) {
            $task = new Task();
            $task->setTaskContent($this->faker->sentence);
            $task->setTaskCreateTime(
                DateTimeImmutable::createFromMutable(
                    $this->faker->dateTimeBetween('-100 days', '-1 days')
                )
            );
            $this->manager->persist($task);
        }


        $this->manager->flush();
    }
}
