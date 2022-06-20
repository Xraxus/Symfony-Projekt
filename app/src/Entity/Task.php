<?php
/**
 * Task entity.
 */
namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Task class.
 */
#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: 'tasks')]
#[UniqueEntity(fields: ['task_content'])]
class Task
{
    /**
     * Primary key.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * Task content.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Type('string')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $task_content;

    /**
     * Created at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\Type(DateTimeImmutable::class)]
    private ?DateTimeImmutable $task_create_time;

    /**
     * Status.
     * @var Status|null
     */
    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status = null;

    /**
     * Getter for Id.
     *
     * @return int|null Id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for task content.
     *
     * @return string|null task content
     */
    public function getTaskContent(): ?string
    {
        return $this->task_content;
    }

    /**
     * Task Content Setter.
     *
     * @param string $task_content
     *
     * @return $this
     */
    public function setTaskContent(string $task_content): self
    {
        $this->task_content = $task_content;

        return $this;
    }

    /**
     * Getter for task create time.
     *
     * @return DateTimeImmutable|null task create time
     */
    public function getTaskCreateTime(): ?DateTimeImmutable
    {
        return $this->task_create_time;
    }


    /**
     * Setter for task create time.
     *
     * @param DateTimeImmutable|null $task_create_time
     */
    public function setTaskCreateTime(?DateTimeImmutable $task_create_time): void
    {
        $this->task_create_time = $task_create_time;
    }

    /**
     * Status getter
     *
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * Status setter
     *
     * @param Status|null $status
     *
     * @return $this
     */
    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
