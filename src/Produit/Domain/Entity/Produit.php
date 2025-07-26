<?php
namespace App\Produit\Domain\Entity;

use App\Categorie\Domain\Entity\Categorie;

class Produit
{
    private ?int $id;
    private string $title;
    private string $description;
    private float $price;
    private \DateTimeInterface $expirationDate;
    private Categorie $categorie;

    public function __construct(?int $id, string $title, string $description, float $price, \DateTimeInterface $expirationDate, Categorie $categorie)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->expirationDate = $expirationDate;
        $this->categorie = $categorie;
    }

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

    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

}
