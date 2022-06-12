<?php

/**
 * Task fixtures
 */
namespace App\DataFixtures;

use App\Entity\Status;
use App\Entity\Task;
use DateTimeImmutable;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TaskFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     */
    public function loadData(): void
    {
        if (null === $this->manager || null === $this->faker) {
            return;
        }

        $this->createMany(50, 'tasks', function (int $i) {
            $task = new Task();
            $task->setTaskContent($this->faker->sentence);
            $task->setTaskCreateTime(
                DateTimeImmutable::createFromMutable(
                    $this->faker->dateTimeBetween('-100 days', '-1 days')
                )
            );
            /** @var Status $status */
            $status = $this->getRandomReference('status');
            $task->setStatus($status);

            return $task;
        });


        $this->manager->flush();
    }

    public function getDependencies(): array
    {
        return [StatusFixtures::class];
    }
}
