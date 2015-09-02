<?php

namespace IceCreamShop;
/**
 * Class MilkShakeProduct
 * @package IceCreamShop
 * This Class is for handle the MilkShake products
 * Author: Jesus Arriaga Barron   jarriagabarron@gmail.com
 */
class MilkShakeProduct extends AbstractProduct implements InterfaceRules{


    public function __construct()
    {
        $this->setProductRules();
    }

    /**
     * This method define the rules for the MilkShakes Product
     */
    public function setProductRules()
    {
        $this->setMaxSpoons(1);
        $this->setValidContainers(array('Cup'));
        $this->setValidDrinks(array('Milk'));
        $this->name = "Milk Shake";
        $this->setDiscount(5);
        $this->setPrice(11);
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
        $config.= " ".$this->getDrink()->getMilkSelected();
        return $config;
    }



}