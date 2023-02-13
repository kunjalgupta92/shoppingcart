<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $productName;

    /**
    * @ORM\Column(type="string", nullable=false)
    */
    protected $productCode;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $productPrice;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $modified;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode
     */
    public function setProductCode(string $productCode): void
    {
        $this->productCode = $productCode;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    /**
     * @param float $productPrice
     */
    public function setProductPrice(float $productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @throws \Exception
     */
    public function setCreated(\DateTime $created = null): void
    {
        if (!$created && empty($this->getId())) {
            $this->created = new \DateTime("now");
        } else {
            $this->created = $created;
        }
    }

    /**
     * @return \DateTime
     */
    public function getModified(): \DateTime
    {
        return $this->modified;
    }

    /**
     * @param \DateTime $modified
     * @throws \Exception
     */
    public function setModified(\DateTime $modified = null): void
    {
        if (!$modified) {
            $this->modified = new \DateTime("now");
        } else {
            $this->modified = $modified;
        }
    }
}