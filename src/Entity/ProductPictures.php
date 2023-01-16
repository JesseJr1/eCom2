<?php

namespace App\Entity;

use App\Repository\ProductPicturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductPicturesRepository::class)]
class ProductPictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]



    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\ManyToOne(inversedBy: 'productPictures')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Product $product = null;

    #[ORM\Column(nullable: true)]
    private ?int $position = null;

    #[ORM\ManyToOne(inversedBy: 'productPictures')]
    private ?Product $productPictures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getProductPictures(): ?Product
    {
        return $this->productPictures;
    }

    public function setProductPictures(?Product $productPictures): self
    {
        $this->productPictures = $productPictures;

        return $this;
    }
}
