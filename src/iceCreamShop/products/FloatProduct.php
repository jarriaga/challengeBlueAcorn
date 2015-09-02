<?php

namespace IceCreamShop;
/**
 * Class FloatProduct
 * @package IceCreamShop
 * This Class is for handle the Floats products
 * Author: Jesus Arriaga Barron   jarriagabarron@gmail.com
 */
class FloatProduct extends AbstractProduct implements InterfaceRules{


    public function __construct()
    {
        $this->setProductRules();
    }

    /**
     * This method define the rules for the Float Product
     */
    public function setProductRules()
    {
        $this->setMaxSpoons(100);
        $this->setValidContainers(array('Cup'));
        $this->setValidDrinks(array('Soda'));
        $this->name = "Float";
        $this->setDiscount(10);
        $this->setPrice(9);
    }

    /**
     * This method validates the final composite product
     */
    public function validateProduct()
    {
        $this->validateSpoonsAndServingVessel();
        $this->validateDrinks();
    }

    /**
     * @param int|mixed $percentage
     */
    public function setDiscount($percentage = 0)
    {
        $this->discount = $percentage;
    }

    public function getProductConfiguration()
    {
        $config = $this->getName();
        $config.= ", ice cream spoons ".$this->getNumberSpoons();
        $config.= ", serving vessel ".$this->getContainer()->getName();
        $config.= ", drink ".$this->getDrink()->getName();
        $config.= " flavor ".$this->getDrink()->getFlavor();
        return $config;
    }

}