<?php

namespace IceCreamShop;
/**
 * Class IceCreamProduct
 * @package IceCreamShop
 * This Class is for handle the Ice Cream products
 * Author: Jesus Arriaga Barron   jarriagabarron@gmail.com
 */
class IceCreamProduct extends AbstractProduct implements InterfaceRules{

    public function __construct()
    {
        $this->setProductRules();
    }

    /**
     * This method define the rules for the IceCreamProduct
     */
    public function setProductRules()
    {
        $this->setMaxSpoons(2);
        $this->setValidContainers(array('Cone','Cup'));
        $this->name = "Ice Cream";
        $this->setDiscount();
        $this->setPrice(6.50);
    }

    /**
     * This method validates the final composite product
     */
    public function validateProduct()
    {
        $this->validateSpoonsAndServingVessel();

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
        return $config;
    }

}