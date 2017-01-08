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
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $valueSale;
    /**
     * @ORM\Column(type="float")
     */
    private $valueCost;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueSale()
    {
        return $this->valueSale;
    }

    /**
     * @param mixed $valueSale
     * @return Product
     */
    public function setValueSale($valueSale)
    {
        $this->valueSale = $valueSale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueCost()
    {
        return $this->valueCost;
    }

    /**
     * @param mixed $valueCost
     * @return Product
     */
    public function setValueCost($valueCost)
    {
        $this->valueCost = $valueCost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
     /**
     * @param mixed $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

}