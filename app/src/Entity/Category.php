<?php
/**
 * Category entity.
 */

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category class.
 */

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'categories')]
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
    private $id;

    /**
     * Category name.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $category_name;

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
