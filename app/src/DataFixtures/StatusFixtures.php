<?php
/**
 * Status fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Status;

/**
 * Class StatusFixtures.
 */
class StatusFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     */
    public function loadData(): void
    {
        $status = new Status();
        $status->setId(1);
        $status->setStatusName('Oczekujący (Pending)');
        $this->manager->persist($status);
        $this->addReference(sprintf('%s_%d', 'status', 1), $status);

        $status = new Status();
        $status->setId(2);
        $status->setStatusName('Rozpoczęto (Started)');
        $this->manager->persist($status);
        $this->addReference(sprintf('%s_%d', 'status', 2), $status);

        $status = new Status();
        $status->setId(3);
        $status->setStatusName('Ukończono (Completed)');
        $this->manager->persist($status);
        $this->addReference(sprintf('%s_%d', 'status', 3), $status);

        $status = new Status();
        $status->setId(4);
        $status->setStatusName('Porzucono (Dropped)');
        $this->manager->persist($status);
        $this->addReference(sprintf('%s_%d', 'status', 4), $status);

        $this->manager->flush();
    }
}
