<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "produits")]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "float")]
    private float $price;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $expirationDate;

    #[ORM\ManyToOne(targetEntity: DoctrineCategorie::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DoctrineCategorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getExpirationDate(): \DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    public function getCategorie(): ?DoctrineCategorie
    {
        return $this->categorie;
    }

    public function setCategorie(?DoctrineCategorie $categorie): void
    {
        $this->categorie = $categorie;
    }
}