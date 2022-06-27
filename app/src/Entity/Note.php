<?php

/**
 * Note entity.
 */

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Note class.
 */
#[ORM\Entity(repositoryClass: NoteRepository::class)]
#[ORM\Table(name: 'notes')]
#[UniqueEntity(fields: ['noteTitle'])]
class Note
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
     * Note title.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Type('string')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 64)]
    private ?string $noteTitle;

    /**
     * Note content.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Type('string')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $noteContent;

    /**
     * Created at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\Type(DateTimeImmutable::class)]
    private ?DateTimeImmutable $noteCreateTime;

    /**
     * Category.
     *
     * @var Category|null
     */
    #[ORM\ManyToOne(
        targetEntity: "App\Entity\Category",
    )]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

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
     * Getter for note title.
     *
     * @return string|null Note title
     */
    public function getNoteTitle(): ?string
    {
        return $this->noteTitle;
    }

    /**
     * Setter for note title.
     *
     * @param string $noteTitle Note title
     *
     * @return Note
     */
    public function setNoteTitle(string $noteTitle): self
    {
        $this->noteTitle = $noteTitle;

        return $this;
    }

    /**
     * Getter for note content.
     *
     * @return string|null Note content
     */
    public function getNoteContent(): ?string
    {
        return $this->noteContent;
    }

    /**
     * Setter for note content.
     *
     * @param string $noteContent Note content
     *
     * @return Note
     */
    public function setNoteContent(string $noteContent): self
    {
        $this->noteContent = $noteContent;

        return $this;
    }

    /**
     * Getter for note create time.
     *
     * @return DateTimeImmutable|null note create time
     */
    public function getCreateTime(): ?DateTimeImmutable
    {
        return $this->noteCreateTime;
    }


    /**
     * Setter for note create time.
     *
     * @param DateTimeImmutable|null $noteCreateTime
     *
     * @return void
     */
    public function setCreateTime(?DateTimeImmutable $noteCreateTime): void
    {
        $this->noteCreateTime = $noteCreateTime;
    }


    /**
     * Getter for note's category.
     *
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }


    /**
     * Setter for note's category.
     *
     *
     * @param Category|null $category
     *
     * @return $this
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
