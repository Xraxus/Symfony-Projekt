<?php
/**
 * Status entity.
 */

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Status.
 */
#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $statusName;

    /**
     * Id Getter.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Id Setter.
     *
     * @param int $statusId
     *
     * @return void
     */
    public function setId(int $statusId): void
    {
        $this->id = $statusId;
    }

    /**
     * Status name getter.
     *
     * @return string|null
     */
    public function getStatusName(): ?string
    {
        return $this->statusName;
    }

    /**
     * Status name setter.
     *
     * @param string $statusName
     *
     * @return $this
     */
    public function setStatusName(string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }
}
