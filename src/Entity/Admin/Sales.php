<?php

namespace App\Entity\Admin;

use App\Entity\Admin\Product;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\SalesRepository")
 */
class Sales
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
    private $unit_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $total_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $profit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Admin\Product", inversedBy="purchase")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unit_price;
    }

    public function setUnitPrice(int $unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->total_price;
    }

    public function setTotalPrice(string $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getProfit(): ?string
    {
        return $this->profit;
    }

    public function setProfit(string $profit): self
    {
        $this->profit = $profit;

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

    public static function calculateProfit($sale_unit_price,
                                            $sale_quantity,
                                            $purchase_unit_cost){
        $sale_total_price = $sale_unit_price * $sale_quantity;
        $purchase_total_cost = $sale_quantity * $purchase_unit_cost;
        $profit = $sale_total_price - $purchase_total_cost;

        return $profit;
    }
}
