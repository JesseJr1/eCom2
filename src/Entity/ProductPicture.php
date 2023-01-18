<?php

namespace App\Entity;

use App\Repository\ProductPictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ProductPictureRepository::class)]
#[Vich\Uploadable]
class ProductPicture
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\Column(nullable: true)]
    private ?int $Position = null;

    #[ORM\ManyToOne(inversedBy: 'productPictures')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    private ?Product $Product = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'path')]
    private ?File $pathFile = null;

    #[ORM\ManyToOne(inversedBy: 'ProductPicture')]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'ProductImage')]
    private ?Product $productImage = null;

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
        return $this->Position;
    }

    public function setPosition(?int $Position): self
    {
        $this->Position = $Position;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function __toString()
    {
        return $this->getPath();
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $pathFile
     */
    public function setpathFile(?File $pathFile = null): void
    {
        $this->pathFile = $pathFile;

        if (null !== $pathFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getpathFile(): ?File
    {
        return $this->pathFile;
    }

    public function getProductImage(): ?Product
    {
        return $this->productImage;
    }

    public function setProductImage(?Product $productImage): self
    {
        $this->productImage = $productImage;

        return $this;
    }
}
