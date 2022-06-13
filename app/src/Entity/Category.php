<?php
/**
 * Category entity.
 */

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category class.
 */

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'categories')]
#[UniqueEntity(fields: ['category_name'])]
class Category
{

    /**
     * Primary key.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    /**
     * Category name.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Type('string')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 64)]
    private ?string $category_name;

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
     * Getter for category name.
     *
     * @return string|null Category name
     */
    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    /**
     * Setter for created at.
     *
     * @param string $category_name Category name
     * @return Category
     */
    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }
}
