<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * Task class.
 */
#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: 'tasks')]
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
    private $id;

    /**
     * Task content.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $task_content;

    /**
     * Created at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable')]
    private ?DateTimeImmutable $task_create_time;

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

}
