<?php
/**
 * Status fixtures
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
        $status->setStatusName('Pending ');
        $this->manager->persist($status);

        $status = new Status();
        $status->setId(2);
        $status->setStatusName('Started');
        $this->manager->persist($status);

        $status = new Status();
        $status->setId(3);
        $status->setStatusName('Completed');
        $this->manager->persist($status);

        $status = new Status();
        $status->setId(4);
        $status->setStatusName('Dropped');
        $this->manager->persist($status);


        $this->manager->flush();
    }


}
