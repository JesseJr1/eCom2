<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Form\AbstractType;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Vich\Uploadable]
class Product
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?Category $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'product', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[Vich\UploadableField(mapping: 'product', fileNameProperty: 'manual')]
    private ?File $manualFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manual = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductPicture::class)]
    private Collection $ProductPicture;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Review::class, orphanRemoval: true)]
    private Collection $reviews;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Mark::class, orphanRemoval: true)]
    private Collection $marks;


    // private ?float $average = null;

    public function __construct()
    {

        $this->ProductPicture = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageCategoriesFile = null): void
    {
        $this->imageFile = $imageCategoriesFile;

        if (null !== $imageCategoriesFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getManual(): ?string
    {
        return $this->manual;
    }

    public function setManual(?string $manual): self
    {
        $this->manual = $manual;

        return $this;
    }

    public function getManualFile(): ?string
    {
        return $this->manualFile;
    }

    public function setManualFile(?File $manualFile = null): void
    {
        $this->manualFile = $manualFile;

        if (null !== $manualFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return Collection<int, ProductPicture>
     */
    public function getProductPictures(): Collection
    {
        return $this->productPictures;
    }

    public function addProductPicture(ProductPicture $productPicture): self
    {
        if (!$this->productPictures->contains($productPicture)) {
            $this->productPictures->add($productPicture);
            $productPicture->setProduct($this);
        }

        return $this;
    }

    public function removeProductPicture(ProductPicture $productPicture): self
    {
        if ($this->productPictures->removeElement($productPicture)) {
            // set the owning side to null (unless already changed)
            if ($productPicture->getProduct() === $this) {
                $productPicture->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductPicture>
     */
    public function getProductPicture(): Collection
    {
        return $this->ProductPicture;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProduct($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProduct() === $this) {
                $review->setProduct(null);
            }
        }

        return $this;
    }

        public function __toString()
        {
            return $this->getName();
        }

        /**
         * @return Collection<int, Mark>
         */
        public function getMarks(): Collection
        {
            return $this->marks;
        }

        public function addMark(Mark $mark): self
        {
            if (!$this->marks->contains($mark)) {
                $this->marks->add($mark);
                $mark->setProduct($this);
            }

            return $this;
        }

        public function removeMark(Mark $mark): self
        {
            if ($this->marks->removeElement($mark)) {
                // set the owning side to null (unless already changed)
                if ($mark->getProduct() === $this) {
                    $mark->setProduct(null);
                }
            }

            return $this;
        }


        /**
        * Get the value of average
        */
        // public function getAverage()
        // {
        // $marks = $this->marks;

        // if ($marks->toArray() === []) {
        //     $this->average = null;
        //     return $this->average;
        // }

        // $total = 0;
        // foreach ($marks as $mark) {
        //     $total += $mark->getMark();
        // }

        // $this->average = $total / count($marks);


        //     return $this->average;

            
        // }

}