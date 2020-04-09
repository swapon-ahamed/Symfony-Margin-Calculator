<?php

namespace App\Entity\Admin;

use App\Entity\Admin\Product;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\PurchaseRepository")
 */
class Purchase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_in;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_left;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $unit_cost;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $total_cost;

    /**
     * @ORM\Column(type="date")
     */
    private $create_at;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Admin\Product", inversedBy="purchase")
     */
    private $product;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStockIn(): ?int
    {
        return $this->stock_in;
    }

    public function setStockIn(int $stock_in): self
    {
        $this->stock_in = $stock_in;

        return $this;
    }

    public function getStockLeft(): ?int
    {
        return $this->stock_left;
    }

    public function setStockLeft(int $stock_left): self
    {
        $this->stock_left = $stock_left;

        return $this;
    }

    public function getUnitCost(): ?string
    {
        return $this->unit_cost;
    }

    public function setUnitCost(string $unit_cost): self
    {
        $this->unit_cost = $unit_cost;

        return $this;
    }

    public function getTotalCost(): ?string
    {
        return $this->total_cost;
    }

    public function setTotalCost(string $total_cost): self
    {
        $this->total_cost = $total_cost;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

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
}
