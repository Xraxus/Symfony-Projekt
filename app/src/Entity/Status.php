<?php
/**
 * Status entity.
 */
namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Status
 */
#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $status_name;

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
     * @param int $status_id
     *
     * @return void
     */
    public function setId(int $status_id): void
    {
        $this->id = $status_id;
    }

    /**
     * Status name getter.
     *
     * @return string|null
     */
    public function getStatusName(): ?string
    {
        return $this->status_name;
    }

    /**
     * Status name setter.
     *
     * @param string $status_name
     *
     * @return $this
     */
    public function setStatusName(string $status_name): self
    {
        $this->status_name = $status_name;

        return $this;
    }
}
