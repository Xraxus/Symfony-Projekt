<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * Note class.
 */

#[ORM\Entity(repositoryClass: NoteRepository::class)]
#[ORM\Table(name: 'notes')]
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
    private $id;

    /**
     * Category title.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $note_title;

    /**
     * Category content.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $note_content;

    /**
     * Created at.
     *
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable')]
    private ?DateTimeImmutable $note_create_time;

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
        return $this->note_title;
    }

    /**
     * Setter for note title.
     *
     * @param string $note_title Note title
     * @return Note
     */
    public function setNoteTitle(string $note_title): self
    {
        $this->note_title = $note_title;

        return $this;
    }

    /**
     * Getter for note content.
     *
     * @return string|null Note content
     */
    public function getNoteContent(): ?string
    {
        return $this->note_content;
    }

    /**
     * Setter for note content.
     *
     * @param string $note_content Note content
     * @return Note
     */
    public function setNoteContent(string $note_content): self
    {
        $this->note_content = $note_content;

        return $this;
    }
    /**
     * Getter for note create time.
     *
     * @return DateTimeImmutable|null note create time
     */
    public function getCreateTime(): ?DateTimeImmutable
    {
        return $this->note_create_time;
    }

    /**
     * Setter for note create time.
     *
     * @param DateTimeImmutable|null $note_create_time
     */
    public function setCreateTime(?DateTimeImmutable $note_create_time): void
    {
        $this->note_create_time = $note_create_time;
    }

}
